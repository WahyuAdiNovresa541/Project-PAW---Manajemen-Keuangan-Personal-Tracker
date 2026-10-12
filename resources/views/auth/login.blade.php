<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | FinTrack</title>

    <style>
        :root {
            --primary: #155E75;
            --primary-dark: #164E63;
            --background: #F4F8FA;
            --surface: #FFFFFF;
            --text: #20343D;
            --text-muted: #71818A;
            --border: #DCE7EB;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        body {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 24px;
            background: var(--background);
            color: var(--text);
        }

        .login-container {
            width: 100%;
            max-width: 420px;
            padding: 36px;
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: 18px;
            box-shadow: 0 12px 35px rgba(32, 52, 61, 0.06);
        }

        .brand {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            margin-bottom: 30px;
            font-size: 25px;
            font-weight: 700;
        }

        .brand-icon {
            width: 42px;
            height: 42px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 11px;
            background: var(--primary);
            color: white;
            font-size: 23px;
        }

        .heading {
            margin-bottom: 8px;
            text-align: center;
            font-size: 25px;
        }

        .subtitle {
            margin-bottom: 28px;
            color: var(--text-muted);
            text-align: center;
            font-size: 14px;
            line-height: 1.6;
        }

        .form-group {
            margin-bottom: 19px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-size: 13px;
            font-weight: 700;
        }

        input {
            width: 100%;
            min-height: 46px;
            padding: 12px 14px;
            border: 1px solid var(--border);
            border-radius: 9px;
            outline: none;
            font-size: 14px;
        }

        input:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(21, 94, 117, 0.1);
        }

        .login-button {
            width: 100%;
            min-height: 46px;
            margin-top: 5px;
            border: none;
            border-radius: 9px;
            background: var(--primary);
            color: white;
            font-size: 14px;
            font-weight: 700;
            cursor: pointer;
        }

        .login-button:hover {
            background: var(--primary-dark);
        }

        .footer {
            margin-top: 24px;
            color: var(--text-muted);
            text-align: center;
            font-size: 12px;
        }

        @media (max-width: 480px) {
            .login-container {
                padding: 28px 22px;
            }
        }
    </style>
</head>

<body>
    <main class="login-container">
        <div class="brand">
            <span class="brand-icon">F</span>
            <span>FinTrack</span>
        </div>

        <h1 class="heading">Welcome Back!</h1>
        <p class="subtitle">
            Login to manage your personal finances.
        </p>

        <form id="loginForm">
            <div class="form-group">
                <label for="email">Email Address</label>
                <input
                    type="email"
                    id="email"
                    name="email"
                    placeholder="you@example.com"
                    autocomplete="email"
                    required
                >
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input
                    type="password"
                    id="password"
                    name="password"
                    placeholder="Enter your password"
                    autocomplete="current-password"
                    required
                >
            </div>

            <button type="submit" class="login-button">
                Login
            </button>
        </form>

        <p class="footer">
            Personal Finance Tracker · FinTrack
        </p>
    </main>

    <script>
        document.getElementById('loginForm').addEventListener(
            'submit',
            function (event) {
                event.preventDefault();

                alert(
                    'Tampilan login berhasil! ' +
                    'Proses autentikasi akan dihubungkan bersama backend.'
                );
            }
        );
    </script>
</body>
</html>
