import React, { useState, useEffect } from 'react';
import './GridComponentT3.css';

const GridComponentT3 = () => {
  // Définir un état pour stocker les scènes
  const [scenes, setScenes] = useState([]);
  const [gridData, setGridData] = useState([]);
  const [mode, setMode] = useState('configuration');
  const [idUser, setUser] = useState(12);
  const [draggedGridDataId, setDraggedGridDataId] = useState(null); // Garder l'ID de la donnée de grille associée à la cellule glissée


  useEffect(() => {
    setUser(12);
    fetchDataFromAPI(idUser).then(data => {
      setGridData(data);
    });
    fetch('http://192.168.65.91/ProjetDMX/CodeDMX/scenes.php')
      .then(response => response.json())
      .then(data => {
        // Mettre à jour l'état avec les données récupérées
        setScenes(data);
      })
      .catch(error => {
        console.error('Erreur lors de la récupération des scènes:', error);
      });
  }, []);

  const handleCellClick = (cellData) => {
    // Logique à exécuter lorsqu'une cellule est cliquée en mode studio
    alert(`Envoi de l'ID de la scène : ${cellData.idScene}, (${cellData.nom}) vers l'API`);
  };

  const handleCellDragStart = (event, cellId) => {
    // Rechercher l'ID de la donnée de grille associée à la cellule glissée
    console.log('coucou');
    console.log(gridData);
    console.log(cellId);
    const draggedCellData = gridData.find(cell => cell.id === cellId);
    if (draggedCellData) {
      setDraggedGridDataId(draggedCellData.id); // Enregistrer l'ID de la donnée de grille associée à la cellule glissée
    }
  };

  const handleCellDragStartList = (event) => { };
  const handleCellDragOverList = (event) => { };
  const handleCellDropList = (event) => { };

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



  const toggleMode = () => {
    setMode(prevMode => (prevMode === 'studio' ? 'configuration' : 'studio'));
  };

  return (
    <div className="scene-list-container">
      <h3>Liste des Scènes</h3>
      <ul>
        {/* Parcourir les scènes et les afficher dans une liste */}
        {scenes.map(scene => (
          <li >
            <div key={scene.id} className="grid-cell"
              draggable={mode === 'configuration'} // Rendre les cellules glissables uniquement en mode configuration
              onDragStart={(event) => handleCellDragStartList(event)}
              onDragOver={(event) => handleCellDragOverList(event)}
              onDrop={(event) => handleCellDropList(event)}>
              {scene.nom} - {scene.onOff === "1" ? "Activé" : "Désactivé"}
            </div>
          </li>
        ))}
      </ul>
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



export default GridComponentT3;
