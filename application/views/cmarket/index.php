<h1>Cmarket Index</h1>

<table>
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Market Cap</th>
            <th>Price</th>
            <th>Volume (24)</th>
            <th>Circulating Supply</th>
            <th>Change (24)</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($cmarket_contents as $content) : ?>
        <tr>
            <td><?php echo $content['rank'] ?></td>
            <td><?php echo $content['name'] ?></td>
            <td><?php echo number_format($content['market_cap_usd']) ?></td>
            <td><?php echo number_format($content['price_usd']) ?></td>
            <td><?php echo number_format($content['24h_volume_usd']) ?></td>
            <td><?php echo number_format($content['available_supply']).' '. $content['symbol'] ?></td>
            <td><?php echo $content['percent_change_24h'] ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>