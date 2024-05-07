import React, { useState, useEffect } from 'react';
import './GridComponentT2.css';

const GridComponentT2 = () => {
    const [gridData, setGridData] = useState([]);
    const [mode, setMode] = useState('studio');
    const [idUser, setUser] = useState(12);
    const [draggedGridDataId, setDraggedGridDataId] = useState(null); // Garder l'ID de la donnée de grille associée à la cellule glissée


    useEffect(() => {
        setUser(12);
        fetchDataFromAPI(idUser).then(data => {
            setGridData(data);
        });
    }, []);

    const handleCellClick = (cellData) => {
        // Logique à exécuter lorsqu'une cellule est cliquée en mode studio
        alert(`Envoi de l'ID de la scène : ${cellData.idScene}, (${cellData.nom}) vers l'API`);
    };

    const handleCellDragStart = (event, cellId) => {
        // Rechercher l'ID de la donnée de grille associée à la cellule glissée
        console.log(gridData);
        console.log(cellId);
    const draggedCellData = gridData.find(cell => cell.id === cellId);
    if (draggedCellData) {
      setDraggedGridDataId(draggedCellData.id); // Enregistrer l'ID de la donnée de grille associée à la cellule glissée
    }
    };

    const handleCellDragOver = (event) => {
        event.preventDefault();
    };

    const handleCellDrop = async (event, targetCellId) => {
        event.preventDefault();
        const draggedCellId = event.dataTransfer.getData('text/plain');
        console.log('x ' + targetCellId[5] + ' y  ' + targetCellId[7] + ' cell ' + draggedGridDataId)
        const targetX = targetCellId[5];
        const targetY = targetCellId[7];

        // Vérifier si les coordonnées sont valides (0, 1 ou 2)
        if (![0, 1, 2].includes(parseInt(targetX)) || ![0, 1, 2].includes(parseInt(targetY))) {

            return; // Ne rien faire si les coordonnées ne sont pas valides
        }

        // Mettre à jour la cellule dans la base de données
        await updateCellInDatabase(draggedGridDataId, targetX, targetY);

        // Si nécessaire, recharger la grille avec les nouvelles données
        fetchDataFromAPI(12).then(data => {
            setGridData(data);
        });
    };


    const renderGrid = () => {
        const gridItems = [];
        for (let i = 0; i < 9; i++) {
            const x = String(i % 3);
            const y = String(Math.floor(i / 3));
            const cellData = gridData.find(cell => parseInt(cell.x) === i % 3 && parseInt(cell.y) === Math.floor(i / 3));
            const sceneName = cellData ? cellData.nom : ''; // Nom de la scène
            
            const cellClassName = `grid-cell ${cellData && cellData.onOff === "1" ? 'highlighted' : 's'}`; // Ajoute la classe 'highlighted' si onOff est égal à 1

            const cellId = `cell-${x}-${y}`;

            gridItems.push(
                <div
                    key={i}
                    id={cellId}
                    className={cellClassName}
                    draggable={mode === 'configuration'} // Rendre les cellules glissables uniquement en mode configuration
                    onClick={() => handleCellClick(cellData)}
                    onDragStart={(event) => handleCellDragStart(event, cellData.id)}
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
            <div className="grid-container" onDragOver={(event) => handleCellDragOver(event)} onDrop={(event) => handleCellDrop(event, 'grid-container')}>
                {renderGrid()}
            </div>
            <button onClick={toggleMode}>Mode {mode === 'studio' ? 'Configuration' : 'Studio'}</button>
        </div>
    );
};

const fetchDataFromAPI = async (userId) => {
    try {
        const response = await fetch(`http://192.168.65.91/ProjetDMX/CodeDMX/getGrille.php?userId=${userId}`);
        if (!response.ok) {
            throw new Error('Failed to fetch data from API');
        }
        const data = await response.json();
        console.log(data);
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


export default GridComponentT2;