<?php
include "php/head.php";
include "php/navbar.php";
include_once "php/dbconfig.php";
session_start();
//setcookie('user[id]', 1, strtotime("+1 month "));
//setcookie('user[email]', 'admin', strtotime("+1 month "));
//setcookie('user[pwd]', 'admin', strtotime("+1 month "));
?>
<main>
    <aside>
        <form action="">
            <div class="input-group">
                <h6>Ville</h6>
                <label for="city"  class="hide" ></label>
                <select name="city" id="city">
                    <option value="0">Ville</option>
                </select>
            </div>
            <div class="input-group">
                <h6>Catégories</h6>
                <div class="checkbox">
                    <label for="sale">Vente</label>
                    <input type="checkbox" name="sale" id="sale">
                </div>
                <div class="checkbox">
                    <label for="rent">Location</label>
                    <input type="checkbox" name="rent" id="rent">
                </div>
            </div>
            <div class="input-group">
                <h6>Prix</h6>
                <div class="row">
                    <label for="min" class="hide" ></label>
                    <input type="number" name="min" id="min" placeholder="min">
                    <span>à</span>
                    <label for="max" class="hide"></label>
                    <input type="number" name="max" id="max" placeholder="max">
                </div>
            </div>
            <div class="input-group">
                <h6>Types</h6>
                <div class="checkbox">
                    <label for="appartement">Appartement</label>
                    <input type="checkbox" name="appartement" id="appartement">
                </div>
                <div class="checkbox">
                    <label for="house">Maison</label>
                    <input type="checkbox" name="house" id="house">
                </div>
                <div class="checkbox">
                    <label for="villa">Villa</label>
                    <input type="checkbox" name="villa" id="villa">
                </div>
                <div class="checkbox">
                    <label for="desk">Bureau</label>
                    <input type="checkbox" name="desk" id="desk">
                </div>
                <div class="checkbox">
                    <label for="field">Terrain</label>
                    <input type="checkbox" name="field" id="field">
                </div>
            </div>
            <input type="submit" value="Rechercher">
        </form>
    </aside>
    <section>
    </section>
</main>
<script src="https://kit.fontawesome.com/a5fdcae6a3.js" crossorigin="anonymous"></script>
</body>
</html>
