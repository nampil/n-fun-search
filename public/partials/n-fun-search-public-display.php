<?php

/**
 * Provide a public-facing view for the plugin
 *
 * This file is used to markup the public-facing aspects of the plugin.
 *
 * @link       https://nampil.dev
 * @since      1.0.0
 *
 * @package    N_Fun_Search
 * @subpackage N_Fun_Search/public/partials
 */



// the API base URL
$baseUrl = 'https://rickandmortyapi.com/api/character';


// Fetch character data from the API


require_once plugin_dir_path(__FILE__) . '../../includes/class-n-fun-search-CharacterFetcher.php';

$fetcher = new CharacterFetcher();



$data = null;
try {
  $responseData = $fetcher->fetchCharacterData( $baseUrl, 'rick');
  // Process the response (decode JSON, etc.)
  $data = json_decode($responseData, true);

} catch (Exception $e) {
  echo "Error fetching character data: " . $e->getMessage();
}

?>


<div class="n-fun-search">
  <form id="nsfForm" class="nfs-form">
    <input id="nsfSearchInput" class="nsf-input" type="text" name="name" placeholder="Enter character name">
    <button class="nsf-btn" type="submit">Search</button>
  </form>

    <div class="nsf-results">
        <?php if ($data) : ?>
       
        <ul class="nsf-ch-list-grid">
            <?php foreach ($data['results'] as $character) : ?>
            <li class="nsf-ch-card">
                <img src="<?php echo $character['image']; ?>" alt="<?php echo $character['name']; ?>">
                <div class="nsf-card-content">
                    <h3><?php echo $character['name']; ?></h3>
                    <p>Status: <?php echo $character['status']; ?></p>
                    <p>Species: <?php echo $character['species']; ?></p>
                </div>
            </li>
            <?php endforeach; ?>
        </ul>
        <?php endif; ?>

    </div>
</div>