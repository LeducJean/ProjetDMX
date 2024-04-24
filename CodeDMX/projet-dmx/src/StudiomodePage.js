import React, { useEffect, useState } from 'react';
import axios from 'axios';
import { Link } from 'react-router-dom';
import './StudiomodePage.css';

const StudiomodePage = () => {
  const [scenes, setScenes] = useState([]);

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

  return (
    <div className="scene-grid">
      <div className="header">
        <h1>Mode Studio</h1>
        <Link to="/configuration">
          <button className="configuration-button">Mode configuration</button>
        </Link>
      </div>
      <div className="scenes-container">
        {scenes.slice(0, 9).map((scene) => (
          <div key={scene.id} className="scene-item">
            <button onClick={() => handleSceneClick(scene.id)}>
              {scene.nom}
            </button>
          </div>
        ))}
      </div>
    </div>
  );
};

export default StudiomodePage;
