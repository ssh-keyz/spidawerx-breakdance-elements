import React, { useState } from 'react';
import ReactDOM from 'react-dom';

const HeroSection = () => {
    const [hoveredIndex, setHoveredIndex] = useState(null);

    const handleMouseEnter = (index) => {
        setHoveredIndex(index);
    };

    const handleMouseLeave = () => {
        setHoveredIndex(null);
    };

    return (
        <div className="hero-section">
            <div className="services">
                {["Branding", "Websites", "Digital Products", "Marketing", "Ongoing Support"].map((service, index) => (
                    <a
                        key={index}
                        href="#"
                        className="service-link"
                        onMouseEnter={() => handleMouseEnter(index)}
                        onMouseLeave={handleMouseLeave}
                        style={{ color: hoveredIndex === index ? '#ff0000' : '#000' }}
                    >
                        {service}
                    </a>
                ))}
            </div>
            <div className="animated-circles">
                <div className="circle" style={{ transform: hoveredIndex !== null ? 'scale(1.2)' : 'scale(1)' }}></div>
                <div className="circle" style={{ transform: hoveredIndex !== null ? 'scale(1.1)' : 'scale(1)' }}></div>
                <div className="circle" style={{ transform: hoveredIndex !== null ? 'scale(1.3)' : 'scale(1)' }}></div>
            </div>
        </div>
    );
};

ReactDOM.render(<HeroSection />, document.getElementById('animated-circles'));
