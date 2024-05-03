import React, { useEffect, useState } from 'react';
import axios from 'axios';

const SQLTestPage = () => {
  const [testResult, setTestResult] = useState('');

  useEffect(() => {
    const executeSQLTests = async () => {
      try {
        // Execute your SQL commands here
        // For example, you can use axios to send a request to your server to execute the SQL commands
        const response = await axios.post('http://your-server-url/execute-sql', {
          commands: [
            'SELECT * FROM scenes;',
            'SELECT * FROM config;',
            // Add more SQL commands as needed
          ],
        });

        // Check the result of each command and set the test result accordingly
        const results = response.data;
        if (results.every((result) => result.success)) {
          setTestResult('ok');
        } else {
          setTestResult('erreur');
        }
      } catch (error) {
        console.error('Error executing SQL commands:', error);
        setTestResult('erreur');
      }
    };

    executeSQLTests();
  }, []);

  return <div>{testResult}</div>;
};

export default SQLTestPage;
