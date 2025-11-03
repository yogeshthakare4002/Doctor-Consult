import React from 'react';
import ReactDOM from 'react-dom/client';
import App from './App';

// Function to initialize React app
window.initDoctorConsultApp = function(containerId) {
  const container = document.getElementById(containerId);
  if (container) {
    const root = ReactDOM.createRoot(container);
    root.render(<App />);
  }
};

// Auto-initialize if container exists
document.addEventListener('DOMContentLoaded', function() {
  const container = document.getElementById('doctor-consult-react-app');
  if (container) {
    window.initDoctorConsultApp('doctor-consult-react-app');
  }
});
