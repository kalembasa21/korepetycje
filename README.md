# Aplikacja do korepetycji

Autor: Kacper Kalembasa

## 1. Wprowadzenie
Aplikacja jest platformą edukacyjną, która umożliwia zarządzanie kursami, materiałami kursu, postępami studentów oraz certyfikatami. Aplikacja obsługuje dwie role użytkowników: Instructor i Student.

## 2. Wymagania funkcjonalne
Rejestracja: Aplikacja umożliwia nowym użytkownikom rejestrację do systemu. Użytkownik musi podać imię oraz nazwisko, klasę, numer telefonu, email, hasło, aby utworzyć nowe konto się do systemu. Użytkownik musi również wybrać swoją rolę (korepetytor, uczeń) podczas rejestracji. 
Logowanie: Aplikacja umożliwia użytkownikom logowanie w systemie. Użytkownik musi podać swojego maila i hasło, aby się zalogować.
Edycja: Aplikacja umożliwia edycję danych zalogowanemu użytkownikowi.
Wylogowanie: Aplikacja umożliwia wylogowanie zalogowanemu użytkownikowi.
Czat: Aplikacja umożliwia zalogowanemu użytkownikowi pisanie na czacie oraz odczytywanie wiadomości wysłanych przez innych użytkowników.

## 3. Wymagania niefunkcjonalne
Wydajność: Aplikacja powinna być wydajna. Powinna być w stanie obsłużyć wielu użytkowników jednocześnie bez spowolnienia. 
Kompatybilność: Aplikacja powinna być kompatybilna z różnymi przeglądarkami internetowymi.
Użyteczność: Aplikacja powinna być łatwa w użyciu. Interfejs użytkownika powinien być intuicyjny i łatwy do nawigacji. 
Niezawodność: Aplikacja powinna być niezawodna. Powinna być dostępna dla użytkowników 24/7.
Skalowalność: Aplikacja powinna być skalowalna. Powinna być w stanie obsłużyć wzrost liczby użytkowników i kursów bez utraty wydajności.

## 4. Architektura aplikacji
Aplikacja jest zbudowana na podstawie architektury klient-serwer. Frontend aplikacji jest zbudowany z wykorzystaniem HTML, CSS i JavaScript. Backend aplikacji jest zbudowany z wykorzystaniem PHP. Aplikacja korzysta z bazy danych MySQL do przechowywania danych.

## 5. Opis interfejsu użytkownika
Logowanie: Użytkownik musi podać swojego maila i hasło, aby zalogować się do systemu.
Rejestracja: Nowy użytkownik musi podać swoje dane, aby utworzyć nowe konto.
Strona edycji i wylogowania: Zalogowany użytkownik może edytować swoje dane oraz się wylogować
Strona czatu: Zalogowany użytkownik może czytać wiadomości na czacie ogólnym dostępnym dla wszystkich użytkowników oraz wysyłać na nim wiadomości.

## 6. Opis bazy danych
Aplikacja korzysta z bazy danych MySQL do przechowywania danych. Baza danych składa się z następujących tabel: `users`, `messages`.

## 7. Instrukcje instalacji
Aplikacja wymaga serwera Apache, PHP i MySQL do działania. Aplikacja może być zainstalowana na dowolnym systemie operacyjnym, który obsługuje te technologie, takim jak Windows, Linux lub MacOS.

## 8. Instrukcje obsługi
Aplikacja jest łatwa w obsłudze. Użytkownik musi zalogować się do systemu, aby uzyskać dostęp do funkcji aplikacji. Użytkownik może czytać wiadomości na czacie oraz pisać na nim.

## 9. Informacje o licencji
Aplikacja jest dostępna na licencji open source. Może być swobodnie używana, modyfikowana i dystrybuowana zgodnie z warunkami licencji. 

## 10. Diagramy
Diagram klas
![image](https://github.com/kalembasa21/korepetycje/assets/101091086/1fd80f12-47f0-435c-b753-eaf38171d6db)

Diagram przypadków użycia
![image](https://github.com/kalembasa21/korepetycje/assets/101091086/069761ac-cc04-442c-b60b-9172582f935f)
