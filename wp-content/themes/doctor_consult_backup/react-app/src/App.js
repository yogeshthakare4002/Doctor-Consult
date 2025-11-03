import React, { useState, useEffect } from 'react';
import './App.css';

// Doctor Card Component
const DoctorCard = ({ doctor, onBookAppointment }) => {
  return (
    <div className="doctor-card">
      <div className="doctor-avatar">
        <img src={doctor.avatar} alt={doctor.name} />
      </div>
      <div className="doctor-info">
        <h3>{doctor.name}</h3>
        <p className="specialization">{doctor.specialization}</p>
        <p className="experience">{doctor.experience} years experience</p>
        <div className="rating">
          <span className="stars">★★★★★</span>
          <span className="rating-text">({doctor.rating})</span>
        </div>
        <div className="consultation-fee">
          <span className="fee">₹{doctor.fee}</span>
          <span className="fee-label">per consultation</span>
        </div>
        <button 
          className="book-btn"
          onClick={() => onBookAppointment(doctor)}
        >
          Book Appointment
        </button>
      </div>
    </div>
  );
};

// Search Component
const SearchBar = ({ onSearch, isLoading }) => {
  const [searchTerm, setSearchTerm] = useState('');

  const handleSubmit = (e) => {
    e.preventDefault();
    onSearch(searchTerm);
  };

  return (
    <div className="search-bar">
      <form onSubmit={handleSubmit}>
        <div className="search-input-group">
          <input
            type="text"
            placeholder="Search for doctors, specialties..."
            value={searchTerm}
            onChange={(e) => setSearchTerm(e.target.value)}
            className="search-input-field"
          />
          <button type="submit" className="search-btn" disabled={isLoading}>
            {isLoading ? 'Searching...' : 'Search'}
          </button>
        </div>
      </form>
    </div>
  );
};

// Filter Component
const FilterPanel = ({ filters, onFilterChange }) => {
  return (
    <div className="filter-panel">
      <h4>Filter by Specialization</h4>
      <div className="filter-options">
        {filters.map((filter) => (
          <label key={filter.id} className="filter-option">
            <input
              type="checkbox"
              checked={filter.checked}
              onChange={(e) => onFilterChange(filter.id, e.target.checked)}
            />
            <span>{filter.label}</span>
            <span className="count">({filter.count})</span>
          </label>
        ))}
      </div>
    </div>
  );
};

// Main App Component
const App = () => {
  const [doctors, setDoctors] = useState([]);
  const [filteredDoctors, setFilteredDoctors] = useState([]);
  const [isLoading, setIsLoading] = useState(false);
  const [filters, setFilters] = useState([
    { id: 'general', label: 'General Medicine', checked: false, count: 5 },
    { id: 'cardiology', label: 'Cardiology', checked: false, count: 3 },
    { id: 'dermatology', label: 'Dermatology', checked: false, count: 4 },
    { id: 'pediatrics', label: 'Pediatrics', checked: false, count: 2 },
    { id: 'orthopedics', label: 'Orthopedics', checked: false, count: 3 }
  ]);

  // Dummy doctor data
  const dummyDoctors = [
    {
      id: 1,
      name: 'Dr. Priya',
      specialization: 'General Medicine',
      experience: 8,
      rating: 4.8,
      fee: 500,
      avatar: 'https://via.placeholder.com/80x80/00a8a8/ffffff?text=PS'
    },
    {
      id: 2,
      name: 'Dr. Rajesh Kumar',
      specialization: 'Cardiology',
      experience: 12,
      rating: 4.9,
      fee: 800,
      avatar: 'https://via.placeholder.com/80x80/00a8a8/ffffff?text=RK'
    },
    {
      id: 3,
      name: 'Dr. Sunita Patel',
      specialization: 'Dermatology',
      experience: 6,
      rating: 4.7,
      fee: 600,
      avatar: 'https://via.placeholder.com/80x80/00a8a8/ffffff?text=SP'
    },
    {
      id: 4,
      name: 'Dr. Amit Singh',
      specialization: 'Pediatrics',
      experience: 10,
      rating: 4.9,
      fee: 450,
      avatar: 'https://via.placeholder.com/80x80/00a8a8/ffffff?text=AS'
    },
    {
      id: 5,
      name: 'Dr. Neha Gupta',
      specialization: 'Orthopedics',
      experience: 7,
      rating: 4.6,
      fee: 700,
      avatar: 'https://via.placeholder.com/80x80/00a8a8/ffffff?text=NG'
    }
  ];

  useEffect(() => {
    setDoctors(dummyDoctors);
    setFilteredDoctors(dummyDoctors);
  }, []);

  const handleSearch = (searchTerm) => {
    setIsLoading(true);
    
    // Simulate API call
    setTimeout(() => {
      const filtered = doctors.filter(doctor =>
        doctor.name.toLowerCase().includes(searchTerm.toLowerCase()) ||
        doctor.specialization.toLowerCase().includes(searchTerm.toLowerCase())
      );
      setFilteredDoctors(filtered);
      setIsLoading(false);
    }, 1000);
  };

  const handleFilterChange = (filterId, checked) => {
    const updatedFilters = filters.map(filter =>
      filter.id === filterId ? { ...filter, checked } : filter
    );
    setFilters(updatedFilters);

    // Apply filters
    const activeFilters = updatedFilters.filter(filter => filter.checked);
    if (activeFilters.length === 0) {
      setFilteredDoctors(doctors);
    } else {
      const filtered = doctors.filter(doctor =>
        activeFilters.some(filter => 
          doctor.specialization.toLowerCase().includes(filter.label.toLowerCase())
        )
      );
      setFilteredDoctors(filtered);
    }
  };

  const handleBookAppointment = (doctor) => {
    alert(`Booking appointment with ${doctor.name} (${doctor.specialization})`);
  };

  return (
    <div className="react-doctor-consult">
      <div className="app-header">
        <h2>Find Your Doctor</h2>
        <p>Book appointments with qualified doctors from the comfort of your home</p>
      </div>

      <div className="app-content">
        <div className="search-section">
          <SearchBar onSearch={handleSearch} isLoading={isLoading} />
        </div>

        <div className="main-content">
          <div className="filters-sidebar">
            <FilterPanel filters={filters} onFilterChange={handleFilterChange} />
          </div>

          <div className="doctors-grid">
            {isLoading ? (
              <div className="loading">Loading doctors...</div>
            ) : filteredDoctors.length > 0 ? (
              filteredDoctors.map(doctor => (
                <DoctorCard
                  key={doctor.id}
                  doctor={doctor}
                  onBookAppointment={handleBookAppointment}
                />
              ))
            ) : (
              <div className="no-results">
                <p>No doctors found matching your criteria.</p>
                <button onClick={() => setFilteredDoctors(doctors)}>
                  Show All Doctors
                </button>
              </div>
            )}
          </div>
        </div>
      </div>
    </div>
  );
};

export default App;
