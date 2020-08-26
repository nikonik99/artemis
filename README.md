# Artemis: all-in-one ecommerce solution

## ROADMAP
* GUI: Nicola
* CORE: Manuèl, Frency

## PUNTI SALIENTI:
### Bundle:
* Stra-BASIC: per bar/ristorante, menu, ordini take-away e prenotazioni.
* BASIC: No gestiona magazzino, no integrazioni terze, statistiche di base
* PREMIUM: Insight avanzati, gestione magazzino, predisp. interfaccia gestionale
* PRO: Tutto

## IDEE:
* Possibilità di aggiungere un singolo prodotto o un gruppo di prodotti sia formattati che non (attraverso form)
* Possibilità di modifica in blocco dei prodotti
* Gestione decente di taglie e colori
* Gestione decente (che l'utente non diventi scemo) per capire la misura di un oggetto
* Durante l'installazione suggerire come fare foto decenti

### Frontend:
* Responsive
* AJAX
* SEO-Friendly

### Backend:
* 

## INFO
### Struttura gestione temi
#### FILE:
* *.lyc Componente del layout
* *.lyt Template del layout
* *.lynfo Manifest del layout

La gestione temi è stata strutturata in questo modo:
Tutto dipende dal controller del layout, situato nella cartella omonima, che legge i dettagli del tema nel file _ theme.lynfo _ che funge da manifest.
#### _ partials _ : contiene i layout parziali dei singoli componenti del template layout grafico
* _ components _ che va a raccogliere i vari componenti comuni al template (meta)
* _ skel _ contiene lo scheletro vero e proprio delle varie pagine
* _ stylesheets _ contiene gli stylesheets di personalizzazione non generali del sito, bensì della singola pagina
#### _ resources _ : contiene le risorse principali del template
* _ components _ contiene componenti funzionali alle risorse (include di font e scripts) salvati sul file _ include.lyc _
* _ images _ immagini che riguardano la struttura di base del template, ad esempio uno sfondo dell'header o lo sfondo del sito (no loghi, no altra roba)
* _ scripts_ script funzionali al funzionamento di base del template. (JS, jQuery, ecc.)

```
layout
|  theme.lynfo
├ partials
│    ├ components
│    │   └ meta.lyc
│    │
│    ├ skel
│    │   ├ account.lyt
│    │   ├ cart.lyt
│    │   ├ footer.lyt
│    │   ├ header.lyt
│    │   ├ index.lyt
│    │   ├ menu.lyt
│    │   └ page.lyt
│    │
│    └ stylesheets
│        ├ reset.css
│        ├ account.css
│        ├ cart.css
│        ├ footer.css
│        ├ header.css
│        ├ index.css
│        ├ menu.css
│        └ page.css
└ resources
     ├ components
     │   └ include.lyc
     ├ images
     │   └ [...]
     └scripts
         └ [...]
            
```
    