## Open eClass 2.3

Το repository αυτό περιέχει μια **παλιά και μη ασφαλή** έκδοση του eclass.
Προορίζεται για χρήση στα πλαίσια του μαθήματος
[Προστασία & Ασφάλεια Υπολογιστικών Συστημάτων (ΥΣ13)](https://ys13.chatzi.org/), **μην τη
χρησιμοποιήσετε για κάνενα άλλο σκοπό**.

### Χρήση μέσω docker

```
# create and start (the first run takes time to build the image)
docker-compose up -d

# stop/restart
docker-compose stop
docker-compose start

# stop and remove
docker-compose down -v
```

To site είναι διαθέσιμο στο http://localhost:8001/. Την πρώτη φορά θα πρέπει να τρέξετε τον οδηγό εγκατάστασης.

### Ρυθμίσεις eclass

Στο οδηγό εγκατάστασης του eclass, χρησιμοποιήστε **οπωσδήποτε** τις παρακάτω ρυθμίσεις:

- Ρυθμίσεις της MySQL
  - Εξυπηρέτης Βάσης Δεδομένων: `db`
  - Όνομα Χρήστη για τη Βάση Δεδομένων: `root`
  - Συνθηματικό για τη Βάση Δεδομένων: `1234`
- Ρυθμίσεις συστήματος
  - URL του Open eClass : `http://localhost:8001/` (προσοχή στο τελικό `/`)
  - Όνομα Χρήστη του Διαχειριστή : `drunkadmin`

Αν κάνετε κάποιο λάθος στις ρυθμίσεις, ή για οποιοδήποτε λόγο θέλετε να ρυθμίσετε
το openeclass από την αρχή, διαγράψτε το directory, `openeclass/config` και ο
οδηγός εγκατάστασης θα τρέξει ξανά.

## 2022 Project 1

Εκφώνηση: https://ys13.chatzi.org/assets/projects/project1.pdf

### Μέλη ομάδας

- 1115201800332, Νικόλας Ηλιόπουλος
- 1115201800022, Μιχάλης Βολάκης

## Defenses
### CSRF Token

Προσθέσαμε ένα CSRF Token για κάθε CRUD action μπορεί να γίνει στο site.

Έτσι αποτρέπουμε το κάθε site από το να γίνει κάποιο action (επειδή στάλθηκε ένα request) χωρίς να έχει ζητηθεί η φόρμα.
Για να γίνει ένα action δηλαδή θα πρέπει να ζητηθεί η φόρμα πρώτα!
Με την ζήτηση της φόρμας θα γίνει generate (και store) ένα token που θα σταλθεί μαζί με την φόρμα.
Όταν θα γίνει submit η φόρμα θα σταλθεί μαζί το token και θα ελέγξει αν είναι ίδιο με αυτό που αποθηκεύτηκε πριν στο server.
Κάθε φορά που γίνεται το check αυτό, γίνεται και regenarate του token.

Στο αρχείο **openeclass/kerberosclan/csrf_utils.php** υπάρχουν τα utils για το csrf token.
Και προσθέσαμε τον κώδικα(με τροποποιησεις) αυτό σε κάθε αρχείο που είχε form ή action που θέλαμε να ασφαλήσουμε.

```php
if (!isset($_SESSION['first_entry'])) { // first time entering this page in this session
	$csrf_token = start_csrf_session('csrf_token');  // generate a new token and store it to session
	$_SESSION['first_entry'] = true;
} else {
  // all the actions that we want to defense
	if (
		isset($_REQUEST['new_assign']) ||
		isset($_REQUEST['download']) ||
		isset($_REQUEST['choice']) ||
		isset($_REQUEST['submit']) ||
		isset($_REQUEST['hide'])
	) {
    // check if the token is valid
    // and if not destroy session and redirect to login page
		$csrf_token = check_csrf_attack('csrf_token', $_REQUEST['csrf_token']);
	}
  // load the token in order to send it with the form
	$csrf_token = get_sessions_csrf_token('csrf_token');
}
```

### SQL Injection

Χρησιμοποιήσαμε **Prepare Statements**.
Συγκεκριμένα σε κάθε query που γίνεται δημιουργία,επεξεργασία ή διαγραφή στοιχείων από την βάση
χρησιμοποιούμε την stmt_prepare της mysqli ώστε να ξεχωρίσουμε την εντολή της SQL από τα δεδομένα
του χρήστη τα οποία γίνονται bind ως παράμετροι πριν εκτελεστεί το κάθε command. Σε παραμέτρους όπου μπορεί να προστεθεί κείμενο χρησιμοποιήσαμε επιπλέον την htmlspecialchars().

```php
$statement = mysqli_stmt_init($connection);
	mysqli_stmt_prepare($statement, $query);
	mysqli_stmt_bind_param(
		$statement,
		"s",
		$user_id
	);
	mysqli_stmt_execute($statement);

	$result = mysqli_stmt_get_result($statement);

```

### XSS

Χρησιμοποιήσαμε το function **htmlspecialchars()** ώστε να αποτρέψουμε τον χρήστη από το να εισάγει
ειδικούς χαρακτήρες και html tags όπως το script για να εισάγει κάποιο κακόβουλο script. Επιπλέον αλλάξαμε το PHP_SELF σε SCRIPT_NAME ώστε να μην εισάγεται κάποιο script μέσω του url της πλατφόρμας.
```php
$title_temp = htmlspecialchars($row['title']);
```
<!-- ## Attacks -->
