<?php echo form_open('cmarket/view') ?>
    <label class="custom-control custom-radio">
      <input name="limit" type="radio" class="custom-control-input" value="100" <?php echo $limit === '100' ? "checked=\"checked\"" : "" ?>>
      <span class="custom-control-indicator"></span>
      <span class="custom-control-description">Top 100</span>
    </label>
    <label class="custom-control custom-radio">
      <input name="limit" type="radio" class="custom-control-input" value="all" <?php echo $limit === 'all' ? "checked=\"checked\"" : "" ?>>
      <span class="custom-control-indicator"></span>
      <span class="custom-control-description">View All</span>
    </label> 
    <?php echo form_dropdown('currency', array('USD' => 'USD', 'SGD' => 'SGD'), $currency) ?>
    <input type="submit" name="btn_submit" value="Show"/>
</form>

<table class="table">
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
            <?php 
                //TODO: refactor this latter
                $market_cap = $content['market_cap_usd'];
                $price = $content['price_usd'];
                $volume24 =  $content['24h_volume_usd'];
                
                if ($currency === 'SGD') {
                    $market_cap = $content['market_cap_sgd'];
                    $price = $content['price_sgd'];
                    $volume24 =  $content['24h_volume_sgd'];
                }
            ?>
            <td><?php echo $content['rank'] ?></td>
            <td><?php echo $content['name'] ?></td>
            <td><?php echo $currency_symbol. number_format($market_cap) ?></td>
            <td><?php echo $currency_symbol. number_format($price) ?></td>
            <td><?php echo $currency_symbol. number_format($volume24) ?></td>
            <td><?php echo number_format($content['available_supply']).' '. $content['symbol'] ?></td>
            <td><?php echo $content['percent_change_24h'] ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>