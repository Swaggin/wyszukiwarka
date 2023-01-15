# Concert Time

## Konfiguracja

### Ogólne

W katalogu `cms/` należy utworzyc nowy plik `wp-config.php` bazując na bazie pliku `wp-config-sample.php`, a następnie uzupełnic wszystkie dane dotyczące konfiguracji bazy danych.

### Host wirtualny

Korzystając z narzędzia XAMPP lub Wampserver należy utworzyć nowego hosta wirtualnego, a następnie wskazać go w następujący katalog:

`wyszukiwarka.test` wskazująca na katalog `/cms`

np. `C:/users/%USERPROFILE%/desktop/wyszukiwarka-koncertow/cms`

### Baza danych

W katalogu `sql` znajduje się eksport bazy danych z wypełnionymi przykładowymi danymi. Należy utworzyć nową bazę danych, a następnie zaimportować plik `db.sql`.

### JS i CSS

* Przejdź do katalogu `wp-content/themes/concerttime` w terminalu
* `npm install` (tylko raz)
* `composer install` (tylko raz)
* `npm run build` aby przebudować skrypty oraz style
* `npm run watch` aby przebudować skrypty oraz style na bieżąco

### Copyright
> &copy; Hubert Jarząbek & Krzysztof Krawczyk

