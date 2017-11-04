[![Build Status](https://travis-ci.org/sarven/simple-shop-cqs.svg?branch=master)](https://travis-ci.org/sarven/simple-shop-cqs)

1. Postaw nowy projekt z uzyciem symfony 3.2
2. Przygotuj (bardzo) prosty sklep, korzystajac z symfony i doctrine jako orm do bazy danych
3. Wymagania funkcjonalne:
	0. Trzymaj się dokładnie tych wymagań
	1. Listowanie produków od najnowszego
		1. 10 produków na stronie
		2. Paginacja produktów
			- Najlepiej wykorzystaj do tego gotowego bundle, zintegrowanego z doctrine: https://github.com/KnpLabs/KnpPaginatorBundle
	2. Mozliwosc zalogowania / wylogowania sie ze strony
		- Mozesz skorzystac z prostego logowania z dokumentacji (in memory http://symfony.com/doc/current/book/security.html ) Nie musisz zapisywac danych uzytkownika w bazie danych
	3. Dodawanie produktów 
		- dodawanie na specjalnej podstronie pod urlem /admin/new-product do ktorego maja dostep tylko zalogowani uztykownicy. Do dodawania, uzyj komponentu form z symfony
		- tylko uzytkownicy zalogowani mogą dodać produkt
		- Produkt powinien miec wymaganą nazwę, opis minimum 100 znaków i cenę w formacie 
  4. Po dodaniu produktu aplikacja wyśle mail z notyfikacją pod adres fake@example.com (ten mail fizycznie nie musi wychodzić, użyj ustawień dla środowiska dev: http://symfony.com/doc/current/email/dev_environment.html)
4. Super jeśli:
  - Gdzieś w swoim rozwiązaniu użyjesz podejścia Command Query Separation np. mozesz wykorzystać to przy tworzeniu i listowaniu produktów
  - Napiszesz przynajmniej 1 test do najważniejszej wg. Ciebie części projektu
  - Rozwiazanie przygotujesz w postaci otwartego repozytorium na githubie