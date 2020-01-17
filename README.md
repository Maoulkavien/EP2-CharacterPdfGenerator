# EP2-CharacterPdfGenerator
Uses data from arokha character generation to generate corresponding filled PDF

Required libraries :

composer require LZCompressor
composer require mpdf/mpdf
composer require paragonie/random_compat:<9.99

Required git repositories :

git clone https://github.com/Arokha/EP2-Data


Usage : 

After creating you character on arokha web helper, export it and copy the chunk of characters.
Paste it in the textarea in the index file, and generate the Ego, Morph or Gear page by clicking the appropriate button.

For gearpack handling, every item marked as "OS" in the Blueprint field will go in first gearpack, every item marked "1+" will go in second gearpack, and every other in the third box.


Knowned caveats:
For now you need to remove manually the 4 lines of comment (beginning with //) in the textarea before submitting.
