<?php
require_once 'proizvodi_controller.php';
require_once 'recenzije_db.php';

if (!isset($_POST['add_show'])): ?>
<form method="post" style="width:350px; margin: 20px auto; text-align:center;">
    <button type="submit" name="add_show" value="1" style="padding:8px 20px;">Dodaj proizvod</button>
</form>
<?php endif; ?>

<?php if (isset($_POST['add_show'])): ?>
<div id="addFormContainer" style="width:350px; margin: 20px auto; border: 1px solid #ccc; padding: 15px; border-radius: 5px; background: #fafafa;">
    <h3>Dodaj novi proizvod</h3>
    <form method="post">
        <label for="addName">Naziv:</label>
        <input type="text" id="addName" name="add_name" required>
        <label for="addPrice">Cena:</label>
        <input type="number" id="addPrice" name="add_price" required>
        <button type="submit">Dodaj</button>
    </form>
</div>
<?php endif; ?>
<table>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Price</th>
        <th>Reviews</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
    <?php foreach($proizvodi as $proizvod): ?>
    <tr>
        <td><?php echo htmlspecialchars($proizvod['id']); ?></td>
        <td>
            <?php echo htmlspecialchars($proizvod['name']); ?>
            <?php
            $recenzije = getRecenzijeByProizvod($proizvod['id']);
            if (!empty($recenzije)) {
                echo '<div class="reviews-preview">';
                foreach ($recenzije as $recenzija) {
                    echo '<div class="review-preview">';
                    // Show stars
                    for ($i = 1; $i <= 5; $i++) {
                        echo '<span class="star ' . ($i <= $recenzija['ocena'] ? 'filled' : '') . '">★</span>';
                    }
                    echo ' ' . htmlspecialchars($recenzija['komentar']);
                    echo '</div>';
                }
                echo '</div>';
            }
            ?>
        </td>
        <td><?php echo htmlspecialchars($proizvod['price']); ?></td>
        <td>
            <a href="recenzije_view.php?id=<?php echo $proizvod['id']; ?>" class="btn">Reviews</a>
        </td>
        <td>
            <form method="post" style="display:inline;">
                <input type="hidden" name="edit_id" value="<?php echo $proizvod['id']; ?>">
                <button type="submit" class="edit-btn">Edit</button>
            </form>
        </td>
        <td>
            <form method="post" style="display:inline;" onsubmit="return confirm('Da li ste sigurni da želite da obrišete ovaj proizvod?');">
                <input type="hidden" name="delete_id" value="<?php echo $proizvod['id']; ?>">
                <button type="submit" class="delete-btn">Delete</button>
            </form>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

<?php if ($editProizvod): ?>
<div id="editFormContainer" style="display:block;">
    <h3>Izmeni proizvod</h3>
    <form method="post">
        <input type="hidden" name="save_id" value="<?php echo htmlspecialchars($editProizvod['id']); ?>">
        <label for="editName">Naziv:</label>
        <input type="text" id="editName" name="name" value="<?php echo htmlspecialchars($editProizvod['name']); ?>" required>
        <label for="editPrice">Cena:</label>
        <input type="number" id="editPrice" name="price" value="<?php echo htmlspecialchars($editProizvod['price']); ?>" required>
        <button type="submit">Sačuvaj</button>
    </form>
</div>
<?php endif; ?>
