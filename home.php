<?php
require_once './inc/config.php';
require_once './inc/functions.php';

$states = getStates($conn);
$selectedState = isset($_GET['state']) ? $_GET['state'] : 25; // Default to Delta State
$selectedLGA = isset($_GET['lga']) ? $_GET['lga'] : null;
$selectedPU = isset($_GET['pu']) ? $_GET['pu'] : null;

$lgas = getLGAs($conn, $selectedState);
$pollingUnits = $selectedLGA ? getPollingUnits($conn, $selectedLGA) : [];
$puResults = $selectedPU ? getPollingUnitResults($conn, $selectedPU) : [];
$lgaResults = $selectedLGA ? getLGAResults($conn, $selectedLGA) : [];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="./assets/css/home.css">
</head>

<body>
    <header>
        <h1>Election Results Dashboard</h1>
    </header>
    <main>
        <section id="filters">
            <form action="" method="GET">
                <label for="state">Select State:</label>
                <select name="state" id="state" onchange="this.form.submit()">
                    <?php foreach ($states as $state) : ?>
                        <option value="<?php echo $state['state_id']; ?>" <?php echo $state['state_id'] == $selectedState ? 'selected' : ''; ?>>
                            <?php echo $state['state_name']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>

                <?php if ($selectedState) : ?>
                    <label for="lga">Select LGA:</label>
                    <select name="lga" id="lga" onchange="this.form.submit()">
                        <option value="">Select LGA</option>
                        <?php foreach ($lgas as $lga) : ?>
                            <option value="<?php echo $lga['lga_id']; ?>" <?php echo $lga['lga_id'] == $selectedLGA ? 'selected' : ''; ?>>
                                <?php echo $lga['lga_name']; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                <?php endif; ?>

                <?php if ($selectedLGA) : ?>
                    <label for="pu">Select Polling Unit:</label>
                    <select name="pu" id="pu" onchange="this.form.submit()">
                        <option value="">Select Polling Unit</option>
                        <?php foreach ($pollingUnits as $pu) : ?>
                            <option value="<?php echo $pu['uniqueid']; ?>" <?php echo $pu['uniqueid'] == $selectedPU ? 'selected' : ''; ?>>
                                <?php echo $pu['polling_unit_name']; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                <?php endif; ?>
            </form>
        </section>

        <?php if ($selectedPU && !empty($puResults)) : ?>
            <section id="pu-results">
                <h2>Results for Polling Unit: <?php echo $pollingUnits[array_search($selectedPU, array_column($pollingUnits, 'uniqueid'))]['polling_unit_name']; ?></h2>
                <table>
                    <thead>
                        <tr>
                            <th>Party</th>
                            <th>Score</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($puResults as $result) : ?>
                            <tr>
                                <td><?php echo $result['party_abbreviation']; ?></td>
                                <td><?php echo $result['party_score']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </section>
        <?php endif; ?>

        <?php if ($selectedLGA && !empty($lgaResults)) : ?>
            <section id="lga-results">
                <h2>Summed Results for LGA: <?php echo $lgas[array_search($selectedLGA, array_column($lgas, 'lga_id'))]['lga_name']; ?></h2>
                <table>
                    <thead>
                        <tr>
                            <th>Party</th>
                            <th>Total Score</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $partyTotals = [];
                        foreach ($lgaResults as $result) {
                            if (!isset($partyTotals[$result['party_abbreviation']])) {
                                $partyTotals[$result['party_abbreviation']] = 0;
                            }
                            $partyTotals[$result['party_abbreviation']] += $result['party_score'];
                        }
                        foreach ($partyTotals as $party => $score) :
                        ?>
                            <tr>
                                <td><?php echo $party; ?></td>
                                <td><?php echo $score; ?></td>

                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </section>
        <?php endif; ?>
    </main>
    <footer>
        <p>&copy; 2024 Bincom Election Results Dashboard</p>
    </footer>
</body>

</html>