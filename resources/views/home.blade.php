<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&family=Roboto:wght@500&display=swap" rel="stylesheet">
    
    <style>
        /* Global Styles */
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            color: #DDD;
            line-height: 1.6;
            overflow-x: hidden;
            padding-top: 60px;
            
            /* Background dengan animasi gradient */
            background: #ffffff;
            background-size: 400% 400%; /* Menambah area untuk animasi */
            animation: gradientBackground 10s ease infinite; /* Animasi berjalan selama 10 detik dan loop terus */
        }

        @keyframes gradientBackground {
            0% {
                background-position: 0% 50%;
            }
            50% {
                background-position: 100% 50%;
            }
            100% {
                background-position: 0% 50%;
            }
        }

        h1, h2, h3 {
            font-family: 'Orbitron', sans-serif;
            font-weight: 600;
            color: #D9A8B3;
            text-align: center;
            font-size: 50px;
        }

        p {
            font-weight: 300;
            color: #BBB;

        }

        a {
            text-decoration: none;
            color: inherit;
        }

        /* Header */
        header {
            background-color: #ffffff; /* Semi-transparent header */
            color: #D9A8B3;
            padding: 120px 20px;
            text-align: center;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.5);
            position: relative;
            z-index: 2;
        }

        header h1 {
            margin: 0;
            font-size: 4em;
            letter-spacing: 5px;
            text-transform: uppercase;
            font-weight: 700;
        }

        header p {
            font-size: 1.5em;
            color: #BBB;
            margin-top: 10px;
        }

        /* Navbar Styles */
        nav {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            background-color: rgba(0, 0, 0, 0.7); /* Semi-transparent background */
            z-index: 100;
            padding: 20px 40px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.6);
        }

        nav ul {
            list-style: none;
            display: flex;
            justify-content: center;
            margin: 0;
            padding: 0;
        }

        nav ul li {
            margin: 0 25px;
        }

        nav ul li a {
            font-size: 1.2em;
            font-weight: 600;
            color: #D9A8B3; /* Neon Green color */
            text-transform: uppercase;
            letter-spacing: 2px;
            text-decoration: none;
            transition: color 0.3s ease, transform 0.3s ease;
        }

        nav ul li a:hover {
            color: #00CC66; /* Slightly darker green for hover effect */
            transform: translateY(-2px); /* Subtle lift effect */
        }

        /* Active Link */
        nav ul li a.active {
            color: #00CC66;
            font-weight: bold;
        }

        /* About Section */
        section.about {
            padding: 80px 20px;
            background-color: #222;
            text-align: center;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.4);
            position: relative;
        }

        section.about h2 {
            font-size: 3em;
            margin-bottom: 20px;
            text-transform: uppercase;
            color: #D9A8B3;
        }

        section.about p {
            font-size: 1.2em;
            color: #AAA;
            line-height: 1.7;
        }

        /* Skills Section */
        section.skills {
            background-color: #ffffff;
            padding: 80px 20px;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.4);
            position: relative;
        }

        section.skills h2 {
            font-size: 2.5em;
            margin-bottom: 20px;
        }

        .skills-list {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 40px;
            margin-top: 40px;
        }

        .skill {
            background-color: #333;
            border-radius: 12px;
            padding: 30px;
            box-shadow: 0 6px 30px rgba(0, 0, 0, 0.5);
            transition: transform 0.3s ease, box-shadow 0.3s ease, filter 0.3s ease;
        }

        .skill:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0, 255, 153, 0.5);
            filter: brightness(1.1);
        }

        .skill-name {
            font-size: 1.5em;
            color: #D9A8B3;
            margin-bottom: 15px;
            text-transform: uppercase;
        }

        .skill-description {
            font-size: 1.1em;
            color: #BBB;
            line-height: 1.5;
        }

        /* Card Section */
        .card-container {
            display: flex;
            gap: 30px;
            justify-content: center;
            flex-wrap: wrap;
            margin-top: 40px;
        }

        .card {
            background-color: #444;
            border-radius: 12px;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.5);
            width: 280px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            text-align: center;
            overflow: hidden;
            margin-bottom: 40px;
        }

        .card img {
            width: 100%;
            height: auto; /* Makes the height of the image adjust proportionally */
            max-height: 200px; /* Ensures images don't become too large */
            object-fit: contain; /* Makes sure the aspect ratio is maintained */
        }

        .card h3 {
            font-size: 1.5em;
            color: #D9A8B3;
            margin: 15px 0;
            text-shadow: 0 0 5px rgba(0, 255, 153, 0.7);
        }

        .card p {
            font-size: 1em;
            color: #BBB;
            padding: 0 20px;
            margin-bottom: 20px;
        }

        .card a {
            display: inline-block;
            padding: 12px 20px;
            background-color: #D9A8B3;
            color: #1A1A1A;
            border-radius: 6px;
            font-weight: bold;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        .card a:hover {
            background-color: #00CC66;
            transform: scale(1.1);
        }

        /* Certificate Section */
        .certificate-card-container {
            display: flex;
            gap: 30px;
            justify-content: center;
            flex-wrap: wrap;
            margin-top: 40px;
        }

        .certificate-card {
            background-color: #444;
            border-radius: 12px;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.5);
            width: 280px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            text-align: center;
            overflow: hidden;
            margin-bottom: 40px;
        }

        .certificate-card img {
            width: 100%;
            height: auto;
            max-height: 200px;
            object-fit: contain;
        }

        .certificate-card h3 {
            font-size: 1.5em;
            color: #D9A8B3;
            margin: 15px 0;
            text-shadow: 0 0 5px rgba(0, 255, 153, 0.7);
        }

        .certificate-card p {
            font-size: 1em;
            color: #BBB;
            padding: 0 20px;
            margin-bottom: 20px;
        }

        /* Contact Section */
        section.contact {
            padding: 80px 20px;
            background-color: #222;
            text-align: center;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.4);
            position: relative;
        }

        section.contact h2 {
            font-size: 2.5em;
            margin-bottom: 20px;
            color: #D9A8B3;
        }

        .contact-card {
            background-color: #333;
            border-radius: 12px;
            padding: 30px;
            margin-top: 30px;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.5);
        }

        .contact-card h3 {
            font-size: 1.5em;
            color: #D9A8B3;
            margin-bottom: 10px;
        }

        .contact-card p {
            font-size: 1.2em;
            color: #BBB;
            margin-bottom: 10px;
        }

        /* Scroll to Top Button */
        .scroll-to-top {
            position: fixed;
            bottom: 30px;
            right: 30px;
            background-color: #D9A8B3;
            color: #1A1A1A;
            border: none;
            border-radius: 50%;
            width: 50px;
            height: 50px;
            font-size: 30px;
            cursor: pointer;
            display: none;
            transition: transform 0.3s ease, background-color 0.3s ease;
        }

        .scroll-to-top:hover {
            background-color: #00CC66;
            transform: scale(1.1);
        }

        /* Media Queries for Responsiveness */
        @media (max-width: 768px) {
            .card-container,
            .certificate-card-container {
                flex-direction: column;
                align-items: center;
            }

            .skills-list {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>

    <header>
        <h1>MY PORTFOLIO</h1>
        <p>Web Developer | Programmer</p>
    </header>

    <nav>
        <ul>
            <li><a href="#about">About</a></li>
            <li><a href="#skills">Skills</a></li>
            <li><a href="#projects">Projects</a></li>
            <li><a href="#certificates">Certificates</a></li>
            <li><a href="#contact">Contact</a></li>
        </ul>
    </nav>

    <div id="particles-js"></div>

    <!-- About Section -->
    <section id="about" class="about">
        @foreach($about as $ab)
        <h2>{{$ab->title}}</h2>
        <p>{{$ab->content}}</p>
        @endforeach
    </section>

    <!-- Skills Section -->
    <section id="skills" class="skills">
        <h2>My Skills</h2>
        <div class="skills-list">
            @foreach($skill as $sk)
            <div class="skill">
                <div class="skill-name">{{$sk->name}}</div>
                <div class="skill-description">{{$sk->description}}</div>
            </div>
            @endforeach
        </div>
    </section>

    <!-- Projects Section -->
    <section id="projects" class="projects">
        <h2>My Projects</h2>
        <div class="card-container">
            @foreach($project as $pr)
            <div class="card">
                <img src="{{asset('storage/'.$pr->image_path)}}" alt="Project Image">
                <h3>{{$pr->title}}</h3>
                <p>{{$pr->description}}</p>
                <p>{{$pr->tools}}</p>
            </div>
            @endforeach
        </div>
    </section>

    <!-- Certificates Section -->
    <section id="certificates" class="certificates">
        <h2>My Certificates</h2>
        <div class="certificate-card-container">
            @foreach($certificate as $cert)
            <div class="certificate-card">
                <img src="{{asset('storage/'.$cert->file)}}" alt="Certificate">
                <h3>{{$cert->name}}</h3>
                <p>{{$cert->issued_by}}</p>
                <p>{{$cert->issued_at}}</p>
                <p>{{$cert->description}}</p>
            </div>
            @endforeach
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="contact">
        <h2>Contact Me</h2>
        @foreach($contact as $co)
        <div class="contact-card">
            <h3>Chat Me</h3>
            <p><strong>Name:</strong> {{$co->name}}</p>
            <p><strong>Email:</strong> {{$co->email}}</p>
            <p><strong>Phone:</strong> {{$co->notelp}}</p>
            <p><strong>Message:</strong> {{$co->description}}</p>
        </div>
        @endforeach
    </section>

    <!-- Scroll to Top Button -->
    <button class="scroll-to-top" onclick="window.scrollTo({ top: 0, behavior: 'smooth' })">↑</button>

    <!-- Particles.js -->
    <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
    <script>
        // Scroll to Top button visibility
        window.onscroll = function() {
            var button = document.querySelector('.scroll-to-top');
            if (document.body.scrollTop > 200 || document.documentElement.scrollTop > 200) {
                button.style.display = "block";
            } else {
                button.style.display = "none";
            }
        };


    </script>

</body>
</html>
