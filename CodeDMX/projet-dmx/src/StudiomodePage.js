import React, { useState, useEffect } from 'react';
import axios from 'axios';
import { Link } from 'react-router-dom';
import './StudiomodePage.css'; // Importer le fichier CSS

const StudiomodePage = () => {
  const [scenes, setScenes] = useState([]);
  const [mode, setMode] = useState('studio');

  useEffect(() => {
    const fetchScenes = async () => {
      const result = await axios.get('http://192.168.65.91/ProjetDMX/CodeDMX/scenes.php');
      setScenes(result.data);
    };
    fetchScenes();
  }, []);

  const handleSceneClick = (sceneId) => {
    // code pour gérer le clic sur un bouton de scène
  };

  const handleModeSwitch = () => {
    setMode(mode === 'studio' ? 'configuration' : 'studio');
  };

  return (
    <div className="scene-grid">
      <div className="header">
        <h1>{mode === 'studio' ? 'Mode Studio' : 'Mode Configuration'}</h1>
        <button onClick={handleModeSwitch} className="configuration-button">
          {mode === 'studio' ? 'Mode configuration' : 'Mode studio'}
        </button>
      </div>
      {mode === 'studio' && (
        <div className="scenes-container">
          {scenes.slice(0, 9).map((scene) => (
            <div key={scene.id} className="scene-item">
              <button onClick={() => handleSceneClick(scene.id)}>
                {scene.nom}
              </button>
            </div>
          ))}
        </div>
      )}
      {mode === 'configuration' && ( // Ajouter un conteneur pour le contenu du mode configuration
        <div className="configuration-container">
          <h2>Contenu du mode configuration</h2>
          {/* Ajouter le contenu du mode configuration ici */}
        </div>
      )}
    </div>
  );
};

export default StudiomodePage;
