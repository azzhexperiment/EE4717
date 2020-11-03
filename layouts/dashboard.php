<!-- Featured items -->
<section class="dashboard">

    <h1 class="title">Howdy, partner.</h1>
    <p>Click <a href="admin.php?action=logout">HERE</a> to log out.</p>

    <h1 class="title">Sales Stats</h1>

    <table>
        <thead>
            <tr>
                <th>Range</th>
                <th>Amount</th>
            </tr>
        </thead>

        <tbody>
            <tr>
                <td>Revenue from past 7 days</td>
                <td>$<?= $dashboard->lastSevenDays->amt ?></td>
            </tr>
            <tr>
                <td>Revenue from last month</td>
                <td>$<?= $dashboard->lastMonth->amt ?></td>
            </tr>
        </tbody>

        <tfoot>
            <tr>
                <td>Revenue till date</td>
                <td>$<?= $dashboard->allTime->amt ?></td>
            </tr>
            <tr>
                <td>Best seller</td>
                <td>
                    <a href="product.php?id=<?= $dashboard->bestSellerId ?>">
                        <?= $dashboard->bestSeller->product_name ?>
                    </a>
                </td>
            </tr>
        </tfoot>
    </table>

    <h1 class="title">Inventory</h1>

    <form action="<?= htmlentities($_SERVER['PHP_SELF']) ?>" method="post">
        <table>
            <thead>
                <tr>
                    <th>Product ID</th>
                    <th>Product Name</th>
                    <th>Inventory count</th>
                </tr>
            </thead>

            <tbody>
                <?php for ($i = 0; $i < count($dashboard->inventory['id']); $i++) { ?>
                    <tr>
                        <td>
                            <a href="product.php?id=<?= $dashboard->inventory['id'][$i] ?>">
                                <?= $dashboard->inventory['id'][$i] ?>
                            </a>
                        </td>
                        <td class="text--uppercase">
                            <?= $dashboard->inventory['name'][$i] ?>
                        </td>
                        <td>
                            <input type="number" name="qty[]" id="<?= $dashboard->inventory['id'][$i] ?>" value="<?= $dashboard->inventory['qty'][$i] ?>" required>
                        </td>
                    </tr>
                <?php } ?>

            </tbody>
        </table>

        <div>
            <button type="submit">
                Update inventory
            </button>
        </div>
    </form>
</section>
