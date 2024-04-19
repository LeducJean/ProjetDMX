import React, { useEffect, useState } from 'react';
import axios from 'axios';

const StudiomodePage = () => {
  const [scenes, setScenes] = useState([]);

  useEffect(() => {
    const fetchScenes = async () => {
      const result = await axios.get('http://localhost/ProjetDMX/CodeDMX/scenes.php');
      setScenes(result.data);
    };
    fetchScenes();
  }, []);

  return (
    <div>
      <h1>Mode studio</h1>
      <table>
        <tbody>
          {scenes.slice(0, 9).map((scene) => (
            <tr key={scene.id}>
              <td>{scene.nom}</td>
              <td>{scene.onOff ? 'On' : 'Off'}</td>
              <td>
                <button onClick={() => handleSceneClick(scene.id)}>
                  {scene.onOff ? 'Éteindre' : 'Allumer'}
                </button>
              </td>
            </tr>
          ))}
        </tbody>
      </table>
    </div>
  );
};

const handleSceneClick = (sceneId) => {
  // code pour gérer le clic sur un bouton de scène
};

export default StudiomodePage;