<html>

<?php
echo "<h1>Shark Selection Form</h1>";
?>

<body>
<div>

    <form action ="">
        <label for="firstName">Enter Your First Name</label>  
        <input type="text" id="firstName" placeholder="First Name..">
        <br>
        <label for="lastName">Enter Your Last Name</label>
        <input type="text" id="lastName" placeholder="Last Name..">
        <br>
        <label for="Shark">Select Favorite Shark</label>
        <select id="Shark" name="Shark" disabled>
            <option value="" disabled selected>Select Shark (enter names first)</option>  <!-- placeholder option -->
            <option value="GreatWhite">Great White Shark</option>
            <option value="Hammerhead">Hammerhead Shark</option>
            <option value="Tiger">Tiger Shark</option>
            <option value="Lemon">Lemon Shark</option>
            <option value="Whale">Whale Shark</option>
            <option value="Basking">Basking Shark</option>
        </select>
                <br>
            <img id="sharkPreview" src="" alt="Selected shark" style="display:none;width:600px;height:auto;" />
    </form>   <!-- Keeps all shark pictures the same size -->
</div>
<script>
    const sharkImages = { //Shark images stored for each shark type
        GreatWhite: 'images/greatWhiteShark.jpg',
        Hammerhead: 'images/hammerHead.jpg',
        Tiger: 'images/tigerShark.jpg',
        Lemon: 'images/lemonShark.JPG',
        Whale: 'images/whaleShark.jpeg',
        Basking: 'images/baskingShark.jpg'
    };

    const sel = document.getElementById('Shark');  //Lets the code read which shark has been selected
    const img = document.getElementById('sharkPreview');  //displays the shark image when selected

    // enable shark select only when both first and last name are filled
    const first = document.getElementById('firstName');
    const last = document.getElementById('lastName');

    function updateSelectState(){   
        const filled = first.value.trim() !== '' && last.value.trim() !== '';
        sel.disabled = !filled;
        if (!filled) {
            sel.selectedIndex = 0; // reset to placeholder
            img.src = '';
            img.style.display = 'none';
        }
    }  //all this makes sure that the names are filled in before a shark can be selected, and if the name is deleted, the shark selection is disabled again

    first.addEventListener('input', updateSelectState);
    last.addEventListener('input', updateSelectState);
    updateSelectState();

    sel.addEventListener('change', function(){
        const src = sharkImages[sel.value] || '';
        if (src) {
            img.src = src;
            img.style.display = '';
        } else {
            img.src = '';
            img.style.display = 'none';
        }
    });
</script>
</body>
</html>
        