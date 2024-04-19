import React, { useEffect, useState } from 'react';
import axios from 'axios';

const StudioModePage = () => {
    const [scenes, setScenes] = useState([]);

    useEffect(() => {
        const fetchData = async () => {
            const result = await axios.get('/api/scenes');
            setScenes(result.data);
        };

        fetchData();
    }, []);

    return (
        <div className="studio-mode-page">
            <h1>Mode Studio</h1>
            <div className="grid">
                {scenes.slice(0, 9).map((scene) => (
                    <div key={scene.id} className="scene">
                        {scene.nom}
                    </div>
                ))}
            </div>
        </div>
    );
};

export default StudioModePage;
