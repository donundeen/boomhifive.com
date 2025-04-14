// ... existing code ...
$rs = $conn->Execute($query);
if ($rs && !$rs->EOF && isset($rs->fields['name'])) {  // Add proper checks
    $user = new user("member", $rs->fields['ID']);
    return $user;
}
return false;
// ... existing code ...