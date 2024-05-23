import React from 'react';
import ReactDOM from 'react-dom/client';
import './index.css';
import App from './App';
import reportWebVitals from './reportWebVitals';
import GridComponentT1 from './composant/GridComponentT1';
import GridComponentT2 from './composant/GridComponentT2';
import GridComponentT3 from './composant/GridComponentT3';
import GridComponentT4 from './composant/GridComponentT4';
import GridComponentT5 from './composant/GridComponentT5';

const root = ReactDOM.createRoot(document.getElementById('root'));
root.render(
  <React.StrictMode>
    {/*  <GridComponentT1 />  */}
    {/*  <GridComponentT2 />  */}
    {/*  <GridComponentT3 />  */}
    {/*  <GridComponentT4 />  */}
    {/*  <GridComponentT5 />  */}

    <GridComponentT5 />
  </React.StrictMode>
);

// If you want to start measuring performance in your app, pass a function
// to log results (for example: reportWebVitals(console.log))
// or send to an analytics endpoint. Learn more: https://bit.ly/CRA-vitals
reportWebVitals();