
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register |ReadNova-Ebookstore </title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,700;1,400&family=Montserrat:wght@300;400;600&display=swap" rel="stylesheet">
</head>
<style>
    /* Color Palette: 
   Gold: #c5a059 
   Dark Background: #121212 
   Input Background: #1e1e1e
*/

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}
body {
    background-color: #121212; /* Deep dark background */
    background-image: radial-gradient(circle at center, #1a1a1a 0%, #0a0a0a 100%);
    color: #ffffff;
    font-family: 'Montserrat', sans-serif;
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
}

.registration-container {
    width: 100%;
    max-width: 450px;
    padding: 20px;
}

.form-card {
    background: rgba(30, 30, 30, 0.6);
    backdrop-filter: blur(10px);
    border: 1px solid rgba(197, 160, 89, 0.2); /* Soft gold border */
    padding: 40px;
    border-radius: 4px;
    text-align: center;
    box-shadow: 0 15px 35px rgba(0, 0, 0, 0.5);
}

header h1.logo-text {
    font-family: 'Playfair Display', serif;
    font-size: 2rem;
    letter-spacing: 2px;
    margin-bottom: 30px;
    color: #c5a059;
}

header h2 {
    font-family: 'Playfair Display', serif;
    font-size: 1.5rem;
    text-transform: uppercase;
    letter-spacing: 3px;
    margin-bottom: 10px;
}

header p {
    font-size: 0.85rem;
    color: #888;
    margin-bottom: 30px;
    font-style: italic;
}

.input-group {
    text-align: left;
    margin-bottom: 20px;
}

.input-group label {
    display: block;
    font-size: 0.75rem;
    text-transform: uppercase;
    letter-spacing: 1.5px;
    margin-bottom: 8px;
    color: #c5a059;
}

.input-group input {
    width: 100%;
    padding: 12px 15px;
    background: #1e1e1e;
    border: 1px solid #333;
    border-radius: 2px;
    color: #fff;
    font-family: 'Montserrat', sans-serif;
    transition: border 0.3s ease;
}

.input-group input:focus {
    outline: none;
    border-color: #c5a059;
    background: #252525;
}

.btn-register {
    width: 100%;
    padding: 15px;
    background-color: #c5a059;
    color: #000;
    border: none;
    font-weight: 600;
    letter-spacing: 2px;
    cursor: pointer;
    margin-top: 10px;
    transition: transform 0.2s ease, background-color 0.3s ease;
}

.btn-register:hover {
    background-color: #d4b475;
    transform: translateY(-2px);
}

footer {
    margin-top: 30px;
    border-top: 1px solid rgba(255, 255, 255, 0.1);
    padding-top: 20px;
}

footer p {
    font-size: 0.8rem;
    color: #aaa;
}

footer a {
    color: #fff;
    text-decoration: none;
    font-weight: 600;
    border-bottom: 1px solid #c5a059;
    padding-bottom: 2px;
    margin-left: 5px;
}

footer a:hover {
    color: #c5a059;
}
</style>
<body>
    <div class="registration-container">
        <div class="form-card">
            <header>
                <h1 class="logo-text">ReadNova Ebookstore </h1>
                <h2>Create Your Account</h2>
                <p>Step into a world of refined elegance.</p>
            </header>

            <form action="register_logic.php" method="POST">
                <div class="input-group">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" placeholder="Choose a unique username" required>
                </div>

                <div class="input-group">
                    <label for="email">Email Address</label>
                    <input type="email" name="email" id="email" placeholder="your.email@example.com" required>
                </div>

                <div class="input-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" placeholder="Minimum 8 characters" required>
                </div>

                <button type="submit" name="submit" class="btn-register">REGISTER NOW</button>
            </form>

            <footer>
                <p>Already have an account? <a href="#">SIGN IN</a></p>
            </footer>
        </div>
    </div>
</body>
</html>