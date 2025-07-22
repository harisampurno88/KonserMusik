<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Gradient Fest Landing Page</title>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap');

    /* Reset & base */
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    html, body {
      height: 100%;
      font-family: 'Poppins', sans-serif;
      background-color: #12121f;
      color: #1e1e1e;
      overflow-x: hidden;
    }

    /* Container for whole landing page */
    .landing-container {
      max-width: 1200px;
      margin: 0 auto;
      background: #ffe9d4;
      box-shadow: 0 0 20px rgb(255 255 255 / 0.1);
      border-radius: 8px;
      position: relative;
      min-height: 90vh;
      padding: 0 20px 60px 20px;
      display: flex;
      flex-direction: column;
    }

    /* Section top title */
    .landing-title {
      font-weight: 700;
      font-size: 1.3rem;
      padding: 32px 0 12px 0;
      color: white;
      text-align: center;
      letter-spacing: 1.5px;
      font-variant: small-caps;
    }

    /* Navigation bar container */
    nav {
      background: #ffe2c9;
      box-shadow: inset 0 -100px 120px -160px #ff5138ef,
                  inset -100px 100px 110px -160px #8053ff9c;
      padding: 12px 40px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      border-radius: 0 0 10px 10px;
      font-size: 0.95rem;
      font-weight: 500;
    }

    /* Logo container */
    .logo {
      display: flex;
      align-items: center;
      font-weight: 900;
      font-size: 1.3rem;
      letter-spacing: 2px;
      gap: 10px;
      user-select: none;
    }

    /* Logo icon - pixel style music deck */
    .logo-icon {
      font-family: monospace;
      font-size: 1.35rem;
      line-height: 0;
    }

    /* Nav menu */
    .nav-links {
      display: flex;
      gap: 32px;
    }

    .nav-links a {
      color: #1e1e1e;
      text-decoration: none;
      font-weight: 500;
      cursor: pointer;
      transition: color 0.25s ease;
      position: relative;
    }

    .nav-links a:hover {
      color: #ff463d;
    }

    /* Sign In + search */
    .nav-signin {
      display: flex;
      align-items: center;
      gap: 14px;
      color: #1e1e1e;
      font-weight: 600;
      cursor: pointer;
      user-select: none;
    }

    .nav-signin:hover {
      color: #ff463d;
    }

    .search-icon {
      font-weight: bold;
      font-size: 1.1rem;
      border: 1px solid transparent;
      border-radius: 50%;
      padding: 2px 7px 1px 7px;
      background: #00000012;
      transition: background-color 0.3s ease;
    }
    .search-icon:hover {
      background-color: #ff463d;
      color: white;
    }

    /* Main landing content */
    .landing-content {
      flex: 1;
      padding: 60px 30px;
      display: flex;
      gap: 60px;
      position: relative;
      overflow: visible;
    }

    /* Left side text content */
    .landing-text {
      flex: 1;
      display: flex;
      flex-direction: column;
      justify-content: center;
      gap: 24px;
      max-width: 540px;
      z-index: 2;
    }

    .landing-text h1 {
      font-size: 2.25rem;
      font-weight: 700;
      color: #1e1e1e;
      line-height: 1.3;
      letter-spacing: 0.06em;
      user-select: none;
    }

    .landing-text p {
      font-weight: 400;
      font-size: 1rem;
      color: #4c4c4c;
      user-select: none;
      line-height: 1.5;
    }

    .btn-tickets {
      margin-top: 8px;
      display: inline-flex;
      align-items: center;
      gap: 12px;
      cursor: pointer;
      font-weight: 600;
      font-size: 1rem;
      color: white;
      background: linear-gradient(135deg, #a370ff 0%, #8b5fff 40%, #bb6cff 100%);
      border: none;
      border-radius: 8px;
      padding: 14px 32px;
      transition: filter 0.3s ease;
      box-shadow: 0 5px 10px rgb(187 108 255 / 0.6);
      user-select: none;
    }
    .btn-tickets:hover {
      filter: brightness(1.15);
    }

    .btn-tickets::after {
      content: '›';
      font-weight: 900;
      font-size: 1.3rem;
      margin-left: 6px;
    }

    /* Right side image container with decorative shapes */
    .landing-image-container {
      flex: 1;
      display: flex;
      flex-direction: column;
      align-items: center;
      position: relative;
      z-index: 2;
      user-select: none;
    }

    .landing-image-container img {
      width: 100%;
      max-width: 360px;
      border-radius: 50% 50% 50% 50% / 57% 59% 41% 43%;
      box-shadow: 0 12px 16px rgb(255 115 120 / 0.9),
                  0 4px 16px rgb(78 0 255 / 0.5);
      object-fit: cover;
      transition: filter 0.3s ease;
      cursor: default;
    }
    .landing-image-container img:hover {
      filter: saturate(1.2);
    }

    /* Follow us & social */
    .follow-us {
      margin-top: 22px;
      align-self: flex-start;
      color: #362f64;
      font-weight: 700;
      font-size: 1rem;
      display: flex;
      align-items: center;
      gap: 16px;
      user-select: none;
    }

    .social-icons {
      display: flex;
      gap: 14px;
    }

    .social-icons a {
      display: flex;
      justify-content: center;
      align-items: center;
      text-decoration: none;
      background: linear-gradient(135deg, #a370ff 0%, #8b5fff 40%, #bb6cff 100%);
      width: 32px;
      height: 32px;
      border-radius: 50%;
      color: white;
      font-size: 1.1rem;
      transition: filter 0.2s ease;
    }
    .social-icons a:hover {
      filter: brightness(1.2);
    }

    /* Abstract line shapes as SVG lines */
    .shape-cone {
      position: absolute;
      top: 30px;
      left: 16px;
      width: 72px;
      height: 72px;
      stroke: #1e1e1e;
      fill: transparent;
      stroke-width: 1.8;
      user-select: none;
      pointer-events: none;
      opacity: 0.2;
    }
    .shape-star {
      position: absolute;
      top: 70px;
      right: 30px;
      width: 76px;
      height: 76px;
      stroke: #1e1e1e;
      fill: transparent;
      stroke-width: 1.7;
      user-select: none;
      pointer-events: none;
      opacity: 0.2;
    }
    .shape-abstract {
      position: absolute;
      bottom: 70px;
      left: 120px;
      width: 160px;
      height: 160px;
      stroke: #1e1e1e;
      fill: transparent;
      stroke-width: 1.4;
      user-select: none;
      pointer-events: none;
      opacity: 0.16;
      transform-origin: center;
      animation: rotateShape 25s linear infinite;
    }

    @keyframes rotateShape {
      0%   { transform: rotate(0deg); }
      100% { transform: rotate(360deg); }
    }

    /* Background multi-color radial gradient effect */
    .landing-container::before {
      content: "";
      position: absolute;
      top: 30px;
      left: 0;
      right: 0;
      bottom: 0;
      background:
        radial-gradient(circle at 15% 20%, #ff463daa 120px, transparent 280px),
        radial-gradient(circle at 80% 90%, #8b5fffaa 100px, #4900a6aa 320px);
      z-index: 1;
      pointer-events: none;
      border-radius: 8px;
    }

    /* Date footer */
    .date-footer {
      background: #1e1e1e;
      color: white;
      font-weight: 600;
      font-size: 1.1rem;
      letter-spacing: 0.1em;
      padding: 10px 14px;
      text-align: center;
      font-variant: small-caps;
      align-self: center;
      width: max-content;
      border-radius: 0 0 10px 10px;
      margin-top: auto;
      user-select: none;
      z-index: 10;
      box-shadow: 0 3px 10px rgb(78 0 255 / 0.9);
    }

    /* Responsive */
    @media (max-width: 900px) {
      nav {
        padding: 12px 20px;
      }
      .landing-content {
        gap: 24px;
        flex-direction: column;
        padding: 40px 16px;
      }
      .landing-text {
        max-width: 100%;
      }
      .landing-image-container {
        max-width: 320px;
        margin: 0 auto;
      }
      .date-footer {
        width: 100%;
        border-radius: 0 0 8px 8px;
        font-size: 1rem;
      }
    }
    @media (max-width: 400px) {
      .landing-text h1 {
        font-size: 1.75rem;
      }
      .nav-links {
        display: none;
      }
      .nav-signin {
        font-size: 0.95rem;
      }
      .btn-tickets {
        padding: 12px 28px;
        font-size: 0.95rem;
      }
    }
  </style>
</head>
<body>
  <div class="landing-container" role="main" aria-label="Gradient Fest music festival landing page">
    <h1 class="landing-title">LANDING PAGE TEMPLATE</h1>

    <nav role="navigation" aria-label="Primary navigation">
      <div class="logo" aria-label="Gradient Fest logo with music deck icon">
        <span class="logo-icon" aria-hidden="true">▦▦▦</span>
        <span>GRADIENT FEST</span>
      </div>

      <div class="nav-links" role="menubar" aria-label="Site menu">
        <a href="#" role="menuitem" tabindex="0">Home</a>
        <a href="#" role="menuitem" tabindex="0">About</a>
        <a href="#" role="menuitem" tabindex="0">Join Us</a>
        <a href="#" role="menuitem" tabindex="0">Services</a>
      </div>

      <div class="nav-signin" role="button" tabindex="0" aria-label="Sign in">
        <span>Sign In</span>
        <span class="search-icon" aria-hidden="true"></span>
      </div>
    </nav>

    <div class="landing-content">
      <svg class="shape-cone" viewBox="0 0 64 64" aria-hidden="true" focusable="false" >
        <path d="M2 62 L32 2 L62 62 Z" stroke="currentColor" fill="none" />
        <ellipse cx="32" cy="54" rx="20" ry="8" stroke="currentColor" fill="none" />
      </svg>

      <div class="landing-text">
        <h2>Don’t miss the best music festival in town,<br>get your tickets now!</h2>
        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam era.</p>
        <button class="btn-tickets" aria-label="Get Tickets">Tickets</button>
      </div>

      <div class="landing-image-container">
        <img src="https://storage.googleapis.com/workspace-0f70711f-8b4e-4d94-86f1-2a93ccde5887/image/b5e3d03a-0783-440e-a4d1-099834f39405.png" 
             alt="Female lead singer wearing bright red glasses, singing passionately into a microphone on stage with a band and colorful lighting" 
             onerror="this.style.display='none'" />
        <svg class="shape-star" viewBox="0 0 64 64" aria-hidden="true" focusable="false">
          <path d="M32 1 L37 23 L61 23 L41 38 L48 61 L32 47 L16 61 L23 38 L3 23 L27 23 Z" stroke="currentColor" fill="none"/>
        </svg>

        <svg class="shape-abstract" viewBox="0 0 120 120" aria-hidden="true" focusable="false">
          <path d="M30 40 L90 40 L60 90 Z" stroke="currentColor" fill="none" />
          <path d="M40 60 L80 60 L60 20 Z" stroke="currentColor" fill="none" />
        </svg>

        <div class="follow-us" aria-label="Follow us for more on social media">
          <span>Follow us for more!</span>
          <div class="social-icons" role="group" aria-label="Social media links">
            <a href="#" aria-label="YouTube" title="YouTube" role="link" tabindex="0">▶</a>
            <a href="#" aria-label="Facebook" title="Facebook" role="link" tabindex="0">f</a>
            <a href="#" aria-label="Instagram" title="Instagram" role="link" tabindex="0">📸</a>
            <a href="#" aria-label="Twitter" title="Twitter" role="link" tabindex="0">🐦</a>
          </div>
        </div>
      </div>
    </div>

    <div class="date-footer" aria-label="Event date">
      FEBRUARY 20 - 23
    </div>
  </div>
</body>
</html>

