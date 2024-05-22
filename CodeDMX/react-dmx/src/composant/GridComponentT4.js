import React, { useState, useEffect, useRef } from 'react';
import './GridComponentT4.css';

const GridComponentT4 = () => {
    const [gridData, setGridData] = useState([]);
    const [mode, setMode] = useState('studio');
    const [idUser, setUser] = useState(12);
    const [draggedGridDataId, setDraggedGridDataId] = useState(null);
    const [idNewScene, setIdNewScene] = useState(null);
    const webSocket = useRef(null);
    const [scenes, setScenes] = useState([]);

    useEffect(() => {
        setUser(12);
        fetchDataFromAPI(idUser).then(data => {
            setGridData(data);
        });
        fetchSceneFromAPI(idUser).then(data => {
            setScenes(data);
        });

        // Configurer la connexion WebSocket
        webSocket.current = new WebSocket('ws://192.168.64.170:12346'); // Remplacer par l'URL de votre serveur WebSocket
        webSocket.current.onopen = () => {
            console.log('WebSocket connection established');
        };

        webSocket.current.onclose = () => {
            console.log('WebSocket connection closed');
        };

        return () => {
            if (webSocket.current) {
                webSocket.current.close();
            }
        };
    }, [idUser]);

    const handleCellClick = (cellData) => {
        if (mode === 'studio' && cellData) {
            if (webSocket.current && webSocket.current.readyState === WebSocket.OPEN) {
                alert(`Envoi de l'ID de la scène : ${cellData.idScene}, (${cellData.nom}) vers l'API`);
                webSocket.current.send(cellData.idScene);
            } else {
                console.error('WebSocket connection is not open');
            }
        }
    };

    const handleCellDragStart = (event, cellId) => {
        const draggedCellData = gridData.find(cell => cell.id === cellId);
        if (draggedCellData) {
            setDraggedGridDataId(draggedCellData.id);
        }
    };

    const handleCellDragOver = (event) => {
        event.preventDefault();
    };

    const handleCellDrop = async (event, targetCellId) => {
        event.preventDefault();
        const draggedCellId = event.dataTransfer.getData('text/plain');
        const targetX = targetCellId[5];
        const targetY = targetCellId[7];

        if (![0, 1, 2].includes(parseInt(targetX)) || ![0, 1, 2].includes(parseInt(targetY))) {
            return;
        }

        if (draggedGridDataId !== null) {
            await updateCellInDatabase(draggedGridDataId, targetX, targetY);
        }

        if (draggedGridDataId === null) {
            await addSceneOnLightBoard(idNewScene, targetX, targetY, idUser);
        }

        fetchDataFromAPI(12).then(data => {
            setGridData(data);
        });
    };

    const handleCellDragStartList = (event, cellId) => {
        setDraggedGridDataId(null);
        setIdNewScene(cellId);
    };

    const renderGrid = () => {
        const gridItems = [];
        for (let i = 0; i < 9; i++) {
            const x = String(i % 3);
            const y = String(Math.floor(i / 3));
            const cellData = gridData.find(cell => parseInt(cell.x) === i % 3 && parseInt(cell.y) === Math.floor(i / 3));
            const sceneName = cellData ? cellData.nom : '';

            const cellClassName = `grid-cell ${cellData && cellData.onOff === "1" ? 'highlighted' : 's'}`;

            const cellId = `cell-${x}-${y}`;

            gridItems.push(
                <div
                    key={i}
                    id={cellId}
                    className={cellClassName}
                    draggable={mode === 'configuration'}
                    onClick={() => handleCellClick(cellData)}
                    onDragStart={(event) => handleCellDragStart(event, cellData?.id)}
                    onDragOver={(event) => handleCellDragOver(event)}
                    onDrop={(event) => handleCellDrop(event, cellId)}
                >
                    {sceneName}
                </div>
            );
        }
        return gridItems;
    };

    const toggleMode = () => {
        setMode(prevMode => (prevMode === 'studio' ? 'configuration' : 'studio'));
    };

    return (
        <div>
            <h2>Mode {mode === 'studio' ? 'Studio' : 'Configuration'}</h2>
            {mode === 'configuration' && (
                <div className="scene-list-container">
                    <h3>Liste des Scènes</h3>
                    <div className="scene-scroll-container">
                        {scenes.map(scene => (
                            <div
                                key={scene.id}
                                id='cell-0-0'
                                className="grid-cell"
                                draggable={mode === 'configuration'}
                                onDragStart={(event) => handleCellDragStartList(event, scene.id)}
                            >
                                {scene.nom}
                            </div>
                        ))}
                    </div>
                </div>
            )}
            <div className="grid-container" onDragOver={(event) => handleCellDragOver(event)} onDrop={(event) => handleCellDrop(event, 'grid-container')}>
                {renderGrid()}
            </div>
            <button onClick={toggleMode}>Mode {mode === 'studio' ? 'Configuration' : 'Studio'}</button>
        </div>
    );
};

const fetchSceneFromAPI = async (userId) => {
    try {
        const response = await fetch(`http://192.168.65.91/ProjetDMX/CodeDMX/scenes.php`);
        if (!response.ok) {
            throw new Error('Failed to fetch data from API');
        }
        const data = await response.json();
        return data;
    } catch (error) {
        console.error('Error fetching data:', error);
        return [];
    }
};

const fetchDataFromAPI = async (userId) => {
    try {
        const response = await fetch(`http://192.168.65.91/ProjetDMX/CodeDMX/getGrille.php?userId=${userId}`);
        if (!response.ok) {
            throw new Error('Failed to fetch data from API');
        }
        const data = await response.json();
        return data;
    } catch (error) {
        console.error('Error fetching data:', error);
        return [];
    }
};

const updateCellInDatabase = async (id, newX, newY) => {
    try {
        const response = await fetch(`http://192.168.65.91/ProjetDMX/CodeDMX/updatePosition.php?id=${id}&x=${newX}&y=${newY}`, {
            method: 'GET',
            headers: {
                'Content-Type': 'application/json',
            },
        });

        if (!response.ok) {
            throw new Error('Failed to update cell in database');
        }

        console.log('Cell updated in database successfully');
    } catch (error) {
        console.error('Error updating cell in database:', error);
    }
};

const addSceneOnLightBoard = async (idScene, newX, newY, idUser) => {
    try {
        const response = await fetch(`http://192.168.65.91/ProjetDMX/CodeDMX/addScene.php?idUser=${idUser}&idScene=${idScene}&x=${newX}&y=${newY}`, {
            method: 'GET',
            headers: {
                'Content-Type': 'application/json',
            },
        });

        if (!response.ok) {
            throw new Error('Failed to update cell in database');
        }

        console.log('Cell updated in database successfully');
    } catch (error) {
        console.error('Error updating cell in database:', error);
    }
};

export default GridComponentT4;