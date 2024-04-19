import React, { useEffect, useState } from 'react';
import axios from 'axios';
import { Container, Row, Col, Button } from 'react-bootstrap';
import './StudiomodePage.css';

function StudiomodePage() {
  const [scenes, setScenes] = useState([]);

  useEffect(() => {
    const fetchScenes = async () => {
      const result = await axios.get('http://192.168.65.91/ProjetDMX/CodeDMX/scenes.php');
      setScenes(result.data);
    };
    fetchScenes();
  }, []);

  return (
    <Container fluid>
      <Row>
        {scenes.slice(0, 9).map((scene) => (
          <Col key={scene.id} xs={4}>
            <Button variant="primary" onClick={() => handleSceneClick(scene.id)}>
              {scene.nom}
            </Button>
          </Col>
        ))}
      </Row>
    </Container>
  );
}

function handleSceneClick(sceneId) {
  // code pour gérer le clic sur un bouton de scène
}

export default StudiomodePage;
