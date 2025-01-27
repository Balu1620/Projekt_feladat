@extends('layouts.header')

@section('content')

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
            <form method="POST" action="{{ route('register') }}">
                @csrf
                    <div class="mb-3">
                        <label for="Nev" class="form-label">Név</label>
                        <input type="text" class="form-control" id="Nev" name="Nev" required>
                    </div>
                    <div class="mb-3">
                        <label for="FelhasznaloNev" class="form-label">Felhasználónév</label>
                        <input type="text" class="form-control" id="FelhasznaloNev" name="FelhasznaloNev" required>
                    </div>
                    <div class="mb-3">
                        <label for="RegEmail" class="form-label">Email</label>
                        <input type="email" class="form-control" id="RegEmail" name="RegEmail" required>
                    </div>
                    <div class="mb-3">
                        <div id="atError" class="form-text text-danger" style="display: none;">
                            Az email címnek tartalmaznia kell '@' karaktert.
                        </div>
                        <div id="domainError" class="form-text text-danger" style="display: none;">
                            Az email címnek '.com' vagy '.hu' végződéssel kell rendelkeznie.
                        </div>
                    </div>
                    
                    <script>
                        const emailInput = document.getElementById('RegEmail');
                        const atError = document.getElementById('atError');
                        const domainError = document.getElementById('domainError');

                        function validateEmail() {
                            const emailValue = emailInput.value;

                            if (!emailValue.includes('@')) {
                                atError.style.display = 'block';
                            } else {
                                atError.style.display = 'none';
                            }

                            if (!emailValue.endsWith('.com') && !emailValue.endsWith('.hu')) {
                                domainError.style.display = 'block';
                            } else {
                                domainError.style.display = 'none';
                            }
                        }

                        emailInput.addEventListener('input', validateEmail);
                    </script>

                    <div class="mb-3">
                        <label for="Jelszo" class="form-label">Jelszó</label>
                        <input type="Password" class="form-control" id="Jelszo" name="Jelszo" required>
                        <div class="strength-bar">
                            <div class="bar" id="strength-bar"></div>
                        </div>
                        <small id="strength-text"></small>
                    </div>

                    <script>
                        const passwordField = document.getElementById("Jelszo");
                        const strengthBar = document.getElementById("strength-bar");
                        const strengthText = document.getElementById("strength-text");


                        if (!passwordField || !strengthBar || !strengthText) {
                            console.log("Nem található az egyik szükséges elem. Ellenőrizd az ID-ket.");

                        }

                        // Jelszó erősség ellenőrzés 
                        passwordField.addEventListener("input", () => {
                            const passwordValue = passwordField.value;

                            let strength = 0;

                            // Kritériumok ellenőrzése
                            if (passwordValue.length >= 6) strength++;
                            if (/[A-Z]/.test(passwordValue)) strength++;
                            if (/[a-z]/.test(passwordValue)) strength++;
                            if (/[0-9]/.test(passwordValue)) strength++;
                            if (/[^A-Za-z0-9]/.test(passwordValue)) strength++;

                            updateStrengthBar(strength);
                        });

                        // Frissíti a jelszó erősség sávot
                        function updateStrengthBar(strength) {
                            switch (strength) {
                                case 0:
                                case 1:
                                    strengthBar.className = "bar weak"; // CSS osztály 'weak'
                                    strengthText.textContent = "Gyenge a jelszó";
                                    break;
                                case 2:
                                case 3:
                                    strengthBar.className = "bar medium"; // CSS osztály 'medium'
                                    strengthText.textContent = "Közepes a jelszó";
                                    break;
                                case 4:
                                case 5:
                                    strengthBar.className = "bar strong"; // CSS osztály 'strong'
                                    strengthText.textContent = "Erős a jelszó";
                                    break;
                                default:
                                    strengthBar.className = "bar"; // Alapértelmezett stílus
                                    strengthText.textContent = "";
                            }
                        }
                    </script>
                    <div class="mb-3">
                        <label for="Telefonszam" class="form-label">Telefonszám</label>
                        <input type="text" class="form-control" id="Telefonszam" name="Telefonszam" required>
                    </div>
                    <div class="mb-3">
                        <label for="Jogositvany" class="form-label">Jogosítvány</label>
                        <select class="form-control" id="Jogositvany" name="Jogositvany" required>
                            <option value="" disabled selected>Válasszon jogosítvány típust</option>
                            <option value="AM">AM</option>
                            <option value="A1">A1</option>
                            <option value="A2">A2</option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button name="submit" id="submit" class="btn btn-primary">Regisztráció</button>
                    </div>
                </form>
            </div>
            </div>
        </div>
    </div>
</div>

@endsection