<?php
function getStates($conn) {
    $sql = "SELECT * FROM states ORDER BY state_name";
    $result = $conn->query($sql);
    $states = [];
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $states[] = $row;
        }
    }
    return $states;
}

function getLGAs($conn, $stateId) {
    $sql = "SELECT * FROM lga WHERE state_id = ? ORDER BY lga_name";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $stateId);
    $stmt->execute();
    $result = $stmt->get_result();
    $lgas = [];
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $lgas[] = $row;
        }
    }
    return $lgas;
}

function getPollingUnits($conn, $lgaId) {
    $sql = "SELECT * FROM polling_unit WHERE lga_id = ? ORDER BY polling_unit_name";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $lgaId);
    $stmt->execute();
    $result = $stmt->get_result();
    $pollingUnits = [];
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $pollingUnits[] = $row;
        }
    }
    return $pollingUnits;
}

function getPollingUnitResults($conn, $pollingUnitId) {
    $sql = "SELECT * FROM announced_pu_results WHERE polling_unit_uniqueid = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $pollingUnitId);
    $stmt->execute();
    $result = $stmt->get_result();
    $results = [];
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $results[] = $row;
        }
    }
    return $results;
}

function getLGAResults($conn, $lgaId) {
    $sql = "SELECT pu.uniqueid, pu.polling_unit_name, apr.party_abbreviation, apr.party_score
            FROM polling_unit pu
            JOIN announced_pu_results apr ON pu.uniqueid = apr.polling_unit_uniqueid
            WHERE pu.lga_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $lgaId);
    $stmt->execute();
    $result = $stmt->get_result();
    $results = [];
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $results[] = $row;
        }
    }
    return $results;
}
?>
