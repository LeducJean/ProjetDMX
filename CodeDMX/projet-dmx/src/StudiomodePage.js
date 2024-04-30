import React, { useState, useEffect } from 'react';
import axios from 'axios';
import { Link } from 'react-router-dom';
import { DragDropContext, Droppable, Draggable } from 'react-beautiful-dnd';
import './StudiomodePage.css';

const StudiomodePage = () => {
  const [scenes, setScenes] = useState([]);
  const [mode, setMode] = useState('studio');
  const [config, setConfig] = useState([]);

  useEffect(() => {
    const fetchScenes = async () => {
      const result = await axios.get('http://192.168.65.91/ProjetDMX/CodeDMX/scenes.php');
      setScenes(result.data);
    };
    fetchScenes();
  }, []);

  useEffect(() => {
    const fetchConfig = async () => {
      const result = await axios.get('http://192.168.65.91/ProjetDMX/CodeDMX/config.php');
      setConfig(result.data);
    };
    fetchConfig();
  }, []);

  const handleSceneClick = (sceneId) =>  {
    // code pour gérer le clic sur un bouton de scène
  };

  const handleModeSwitch = () => {
    setMode(mode === 'studio' ? 'configuration' : 'studio');
  };

  const handleDragEnd = (result) => {
    if (!result.destination) return;

    const newConfig = Array.from(config);
    const [removed] = newConfig.splice(result.source.index, 1);
    newConfig.splice(result.destination.index, 0, removed);

    setConfig(newConfig);
  };

  const handleSaveConfig = async () => {
    await axios.post('http://192.168.65.91/ProjetDMX/CodeDMX/save_config.php', { config });
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
      {mode === 'configuration' && (
        <DragDropContext onDragEnd={handleDragEnd}>
          <div className="configuration-container">
            <div className="scenes-list">
              {scenes.map((scene, index) => (
                <Draggable key={scene.id} draggableId={scene.id.toString()} index={index}>
                  {(provided) => (
                    <div
                      ref={provided.innerRef}
                      {...provided.draggableProps}
                      {...provided.dragHandleProps}
                    >
                      {scene.nom}
                    </div>
                  )}
                </Draggable>
              ))}
            </div>
            <Droppable droppableId="config">
              {(provided) => (
                <div
                  ref={provided.innerRef}
                  {...provided.droppableProps}
                  className="config-grid"
                >
                  {config.map((sceneId, index) => (
                    <Draggable key={sceneId} draggableId={sceneId.toString()} index={index}>
                      {(provided) => (
                        <div
                          ref={provided.innerRef}
                          {...provided.draggableProps}
                          {...provided.dragHandleProps}
                          className="config-item"
                        >
                          {scenes.find((scene) => scene.id === sceneId)?.nom}
                        </div>
                      )}
                    </Draggable>
                  ))}
                  {provided.placeholder}
                </div>
              )}
            </Droppable>
            <button onClick={handleSaveConfig}>Enregistrer la configuration</button>
          </div>
        </DragDropContext>
      )}
    </div>
  );
};

export default StudiomodePage;
