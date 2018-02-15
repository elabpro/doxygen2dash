
all: generate
	echo "Generate documentaion"

clean:
	rm -rf html
	rm -rf latex

generate: clean
	doxygen
	cd html && $(MAKE) -i
	echo "Making index in SQLite format"
	php generate_sqlite.php

install: all
	echo "Install SOAP API Doc as Zeal dash"
	rm -rf ~/.local/share/Zeal/Zeal/docsets/org.doxygen.Project.docset/
	cp -r html/org.doxygen.Project.docset ~/.local/share/Zeal/Zeal/docsets/

prepare:
	sudo apt install doxygen php-sqlite3 graphviz
