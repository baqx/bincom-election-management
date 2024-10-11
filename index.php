<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Election Results: Interactive Dashboard</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.4/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.4/ScrollTrigger.min.js"></script>
    <link rel="stylesheet" href="./assets/css/config.css">
    <link rel="stylesheet" href="./assets/css/landing.css">
</head>

<body>
    <header>
        <nav>
            <ul>
                <li><a href="#home">Home</a></li>
                <li><a href="#features">Features</a></li>
                <li><a href="./home.php">Dashboard</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section id="home" class="hero">
            <div class="hero-content">
                <h1>Revolutionizing Election Analysis</h1>
                <p>Dive into the 2011 Delta State election data with our cutting-edge interactive dashboard.</p>
                <a href="#features" class="btn">Explore Features</a>
            </div>
        </section>

        <section id="features" class="features">
            <div class="container">
                <div class="feature-grid">
                    <div class="feature">
                        <img src="./assets/icons/vote.svg" alt="Polling Unit Icon">
                        <h3>Polling Unit Insights</h3>
                        <p>Analyze results from individual polling units across Delta State.</p>
                    </div>
                    <div class="feature">
                        <img src="./assets/icons/vote.svg" alt="LGA Summary Icon">
                        <h3>LGA Summaries</h3>
                        <p>Get comprehensive summaries for Local Government Areas at a glance.</p>
                    </div>
                    <div class="feature">
                        <img src="./assets/icons/vote.svg" alt="Data Visualization Icon">
                        <h3>Interactive Visualizations</h3>
                        <p>Explore data through dynamic charts and graphs for easier comprehension.</p>
                    </div>
                    <div class="feature">
                        <img src="./assets/icons/vote.svg" alt="Comparison Icon">
                        <h3>Result Comparisons</h3>
                        <p>Cross-check polling unit totals with announced LGA results for transparency.</p>
                    </div>
                </div>
            </div>
        </section>

        <section id="cta" class="cta">
            <div class="container">
                <h2>Ready to Dive In?</h2>
                <a href="./home.php" class="btn">Launch Dashboard</a>
            </div>
        </section>
    </main>

    <footer>
        <p>&copy; 2024 Bincom Election Results Dashboard</p>
    </footer>

    <script src="./assets/js/landing.js"></script>
</body>

</html>