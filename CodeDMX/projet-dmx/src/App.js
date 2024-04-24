import React from 'react';
import './App.css';
import StudiomodePage from './StudiomodePage';
import { BrowserRouter as Router, Routes, Route } from 'react-router-dom';
import ConfigurationModePage from './ConfigurationmodePage';

function App() {
  return (
    <Router>
      <Routes>
        <Route path="/" element={<StudiomodePage />} />
        <Route path="/mode-configuration" element={<ConfigurationModePage />} />
      </Routes>
    </Router>
  );
}

export default App;
