<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vishu Festival - Office Message</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #1a1a2e 0%, #16213e 50%, #0f3460 100%);
            min-height: 100vh;
            overflow-x: hidden;
            position: relative;
        }

        /* Fireworks Container */
        .fireworks-container {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: 1;
        }

        .firework {
            position: absolute;
            width: 4px;
            height: 4px;
            border-radius: 50%;
            animation: firework 1s ease-out forwards;
        }

        @keyframes firework {
            0% {
                transform: translate(0, 0) scale(1);
                opacity: 1;
            }
            100% {
                transform: translate(var(--x), var(--y)) scale(0);
                opacity: 0;
            }
        }

        /* Crackers Animation */
        .cracker {
            position: absolute;
            width: 8px;
            height: 8px;
            background: #ffd700;
            border-radius: 50%;
            animation: cracker 0.8s ease-out forwards;
            box-shadow: 0 0 10px #ffd700, 0 0 20px #ff6b00;
        }

        @keyframes cracker {
            0% {
                transform: translate(0, 0) scale(1);
                opacity: 1;
            }
            50% {
                transform: translate(var(--x), var(--y)) scale(1.5);
                opacity: 1;
            }
            100% {
                transform: translate(var(--x), var(--y)) scale(0);
                opacity: 0;
            }
        }

        /* Main Content */
        .container {
            position: relative;
            z-index: 10;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            padding: 20px;
            text-align: center;
        }

        .vishu-card {
            background: linear-gradient(135deg, rgba(255, 215, 0, 0.15) 0%, rgba(255, 107, 0, 0.15) 100%);
            backdrop-filter: blur(10px);
            border: 2px solid rgba(255, 215, 0, 0.3);
            border-radius: 20px;
            padding: 60px 40px;
            max-width: 800px;
            width: 100%;
            box-shadow: 0 20px 60px rgba(255, 215, 0, 0.3),
                        0 0 100px rgba(255, 107, 0, 0.2),
                        inset 0 0 50px rgba(255, 215, 0, 0.1);
            animation: cardGlow 3s ease-in-out infinite;
        }

        @keyframes cardGlow {
            0%, 100% {
                box-shadow: 0 20px 60px rgba(255, 215, 0, 0.3),
                            0 0 100px rgba(255, 107, 0, 0.2),
                            inset 0 0 50px rgba(255, 215, 0, 0.1);
            }
            50% {
                box-shadow: 0 20px 60px rgba(255, 215, 0, 0.5),
                            0 0 150px rgba(255, 107, 0, 0.4),
                            inset 0 0 80px rgba(255, 215, 0, 0.2);
            }
        }

        .vishu-title {
            font-size: 4rem;
            font-weight: bold;
            background: linear-gradient(45deg, #ffd700, #ff6b00, #ffd700);
            background-size: 200% 200%;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            animation: gradientShift 3s ease infinite;
            margin-bottom: 20px;
            text-shadow: 0 0 30px rgba(255, 215, 0, 0.5);
        }

        @keyframes gradientShift {
            0%, 100% {
                background-position: 0% 50%;
            }
            50% {
                background-position: 100% 50%;
            }
        }

        .vishu-subtitle {
            font-size: 1.8rem;
            color: #ffd700;
            margin-bottom: 30px;
            text-shadow: 0 0 20px rgba(255, 215, 0, 0.8);
            animation: pulse 2s ease-in-out infinite;
        }

        @keyframes pulse {
            0%, 100% {
                transform: scale(1);
            }
            50% {
                transform: scale(1.05);
            }
        }

        .vishu-message {
            font-size: 1.3rem;
            color: #ffffff;
            line-height: 1.8;
            margin-bottom: 20px;
            text-shadow: 0 2px 10px rgba(0, 0, 0, 0.5);
        }

        .vishu-greeting {
            font-size: 1.5rem;
            color: #ffd700;
            font-weight: bold;
            margin-top: 30px;
            text-shadow: 0 0 20px rgba(255, 215, 0, 0.8);
        }

        .sparkle {
            position: absolute;
            width: 4px;
            height: 4px;
            background: #ffd700;
            border-radius: 50%;
            animation: sparkle 2s ease-in-out infinite;
        }

        @keyframes sparkle {
            0%, 100% {
                opacity: 0;
                transform: scale(0);
            }
            50% {
                opacity: 1;
                transform: scale(1);
            }
        }

        .office-notice {
            margin-top: 40px;
            padding: 20px;
            background: rgba(0, 0, 0, 0.3);
            border-radius: 10px;
            border: 1px solid rgba(255, 215, 0, 0.2);
        }

        .office-notice h3 {
            color: #ffd700;
            margin-bottom: 10px;
            font-size: 1.2rem;
        }

        .office-notice p {
            color: #ffffff;
            font-size: 1rem;
        }

        /* Image Display Section */
        .image-section {
            margin-top: 30px;
            padding: 20px;
        }

        .image-container {
            position: relative;
            width: 100%;
            max-width: 500px;
            margin: 0 auto 20px;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 10px 40px rgba(255, 215, 0, 0.3);
            background: rgba(0, 0, 0, 0.3);
            min-height: 300px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .display-image {
            width: 100%;
            height: auto;
            max-height: 500px;
            object-fit: contain;
            border-radius: 15px;
            transition: all 0.5s ease;
            animation: imageFadeIn 0.5s ease;
        }

        @keyframes imageFadeIn {
            from {
                opacity: 0;
                transform: scale(0.9);
            }
            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        .default-image {
            width: 100%;
            height: auto;
            max-height: 500px;
            object-fit: contain;
        }

        .krishna-btn {
            background: linear-gradient(135deg, #ffd700 0%, #ff6b00 100%);
            color: #1a1a2e;
            border: none;
            padding: 15px 40px;
            font-size: 1.2rem;
            font-weight: bold;
            border-radius: 50px;
            cursor: pointer;
            box-shadow: 0 5px 20px rgba(255, 215, 0, 0.5),
                        0 0 30px rgba(255, 107, 0, 0.3);
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 1px;
            position: relative;
            overflow: hidden;
        }

        .krishna-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 30px rgba(255, 215, 0, 0.7),
                        0 0 40px rgba(255, 107, 0, 0.5);
        }

        .krishna-btn:active {
            transform: translateY(0);
        }

        .krishna-btn::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.5);
            transform: translate(-50%, -50%);
            transition: width 0.6s, height 0.6s;
        }

        .krishna-btn:active::before {
            width: 300px;
            height: 300px;
        }

        .image-placeholder {
            color: #ffd700;
            font-size: 1.5rem;
            text-align: center;
            padding: 40px;
            text-shadow: 0 0 20px rgba(255, 215, 0, 0.8);
        }

        @media (max-width: 768px) {
            .vishu-title {
                font-size: 2.5rem;
            }
            .vishu-subtitle {
                font-size: 1.4rem;
            }
            .vishu-message {
                font-size: 1.1rem;
            }
            .vishu-card {
                padding: 40px 20px;
            }
            .krishna-btn {
                padding: 12px 30px;
                font-size: 1rem;
            }
            .image-container {
                min-height: 250px;
            }
        }
    </style>
</head>
<body>
    <div class="fireworks-container" id="fireworks"></div>
    
    <div class="container">
        <div class="vishu-card">
            <h1 class="vishu-title">വിഷു</h1>
            <h2 class="vishu-subtitle">VISHU</h2>
            <p class="vishu-message">
                വിഷു ആശംസകൾ!<br>
                May this Vishu bring you prosperity, happiness, and new beginnings.<br>
                Let the light of Vishu illuminate your path to success.
            </p>
            <p class="vishu-greeting">
                വിഷു ആശംസകൾ! 🌟
            </p>
            
            <!-- Image Display Section -->
            <div class="image-section">
                <div class="image-container" id="imageContainer">
                    <img src="{{ asset('assets/img/default.jpg') }}" 
                         alt="Default Image" 
                         class="display-image default-image" 
                         id="displayImage"
                         onerror="this.style.display='none'; document.getElementById('imagePlaceholder').style.display='block';">
                    <div class="image-placeholder" id="imagePlaceholder" style="display: none;">
                        🕉️ 
                    </div>
                </div>
                <button class="krishna-btn" onclick="showKrishna()">
                     Click Here To See Kani
                </button>
            </div>
            
            <div class="office-notice">
                
            </div>
        </div>
    </div>

    <script>
        // Create fireworks
        function createFirework(x, y) {
            const colors = ['#ffd700', '#ff6b00', '#ff4500', '#ff1493', '#00ffff', '#ffff00'];
            const particleCount = 30;
            
            for (let i = 0; i < particleCount; i++) {
                const particle = document.createElement('div');
                particle.className = 'firework';
                
                const angle = (Math.PI * 2 * i) / particleCount;
                const velocity = 100 + Math.random() * 100;
                const xOffset = Math.cos(angle) * velocity;
                const yOffset = Math.sin(angle) * velocity;
                
                particle.style.left = x + 'px';
                particle.style.top = y + 'px';
                particle.style.backgroundColor = colors[Math.floor(Math.random() * colors.length)];
                particle.style.setProperty('--x', xOffset + 'px');
                particle.style.setProperty('--y', yOffset + 'px');
                
                document.getElementById('fireworks').appendChild(particle);
                
                setTimeout(() => {
                    particle.remove();
                }, 1000);
            }
        }

        // Create crackers
        function createCracker(x, y) {
            const colors = ['#ffd700', '#ff6b00', '#ff4500'];
            const particleCount = 15;
            
            for (let i = 0; i < particleCount; i++) {
                const particle = document.createElement('div');
                particle.className = 'cracker';
                
                const angle = Math.random() * Math.PI * 2;
                const velocity = 50 + Math.random() * 80;
                const xOffset = Math.cos(angle) * velocity;
                const yOffset = Math.sin(angle) * velocity;
                
                particle.style.left = x + 'px';
                particle.style.top = y + 'px';
                particle.style.backgroundColor = colors[Math.floor(Math.random() * colors.length)];
                particle.style.setProperty('--x', xOffset + 'px');
                particle.style.setProperty('--y', yOffset + 'px');
                
                document.getElementById('fireworks').appendChild(particle);
                
                setTimeout(() => {
                    particle.remove();
                }, 800);
            }
        }

        // Random fireworks
        function randomFirework() {
            const x = Math.random() * window.innerWidth;
            const y = Math.random() * (window.innerHeight * 0.6);
            createFirework(x, y);
        }

        // Random crackers
        function randomCracker() {
            const x = Math.random() * window.innerWidth;
            const y = window.innerHeight * 0.7 + Math.random() * (window.innerHeight * 0.3);
            createCracker(x, y);
        }

        // Initial burst
        setTimeout(() => {
            for (let i = 0; i < 5; i++) {
                setTimeout(() => {
                    randomFirework();
                }, i * 200);
            }
        }, 500);

        // Continuous fireworks
        setInterval(() => {
            if (Math.random() > 0.3) {
                randomFirework();
            }
        }, 2000);

        // Continuous crackers
        setInterval(() => {
            if (Math.random() > 0.4) {
                randomCracker();
            }
        }, 1500);

        // Click to create fireworks (but not on button)
        document.addEventListener('click', (e) => {
            if (!e.target.classList.contains('krishna-btn')) {
                createFirework(e.clientX, e.clientY);
            }
        });

        // Show Krishna image function
        function showKrishna() {
            const imageContainer = document.getElementById('imageContainer');
            const displayImage = document.getElementById('displayImage');
            const placeholder = document.getElementById('imagePlaceholder');
            
            // Create special firework effect
            const rect = imageContainer.getBoundingClientRect();
            const centerX = rect.left + rect.width / 2;
            const centerY = rect.top + rect.height / 2;
            
            for (let i = 0; i < 10; i++) {
                setTimeout(() => {
                    createFirework(centerX + (Math.random() - 0.5) * 200, 
                                 centerY + (Math.random() - 0.5) * 200);
                }, i * 50);
            }
            
            // Change image to Krishna
            displayImage.src = "{{ asset('assets/img/anaks.png') }}";
            displayImage.alt = "Krishna";
            displayImage.style.display = 'block';
            placeholder.style.display = 'none';
            
            // Add error handling for Krishna image
            displayImage.onerror = function() {
                this.style.display = 'none';
                placeholder.innerHTML = '🕉️';
                placeholder.style.display = 'block';
            };
            
            // Add animation
            displayImage.style.animation = 'none';
            setTimeout(() => {
                displayImage.style.animation = 'imageFadeIn 0.5s ease';
            }, 10);
        }

        // Create sparkles on the card
        const card = document.querySelector('.vishu-card');
        for (let i = 0; i < 20; i++) {
            const sparkle = document.createElement('div');
            sparkle.className = 'sparkle';
            sparkle.style.left = Math.random() * 100 + '%';
            sparkle.style.top = Math.random() * 100 + '%';
            sparkle.style.animationDelay = Math.random() * 2 + 's';
            card.appendChild(sparkle);
        }
    </script>
</body>
</html>
