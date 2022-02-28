# Thème WordPress
**lapetiteboucle** est un thème WordPress pour le site [lapetiteboucle.fr](https://www.lapetiteboucle.fr), une association qui collecte des cartouches d'encre et de toner usagés.

# Éco-conception
Ce thème a été conçu avec l’idée de réduire l’impact environnemental du site. À chaque phase du projet, l’éco-conception était au centre des préoccupations.
Il s’agit de réduire au maximum les charges réseau tant en quantité qu’en nombre ( images, typos, styles, scripts ) et d’optimiser le traitement des ressources ( requêtes à la base de données, complexité du DOM, etc. ) afin de moins solliciter les terminaux. Le site s’affichera correctement sur un vieux terminal. 

## Fonctionnalités
Le projet correspond aux besoins en fonctionnalités du client ( formulaire de contact, modèle d’article, modifications sur les pages ) tout en allégeant le cœur de WordPress.
Ainsi, ce thème ne supporte pas les styles des blocs Gutenberg ( 79 k en moins, tout de même ! ).
Les différentes fonctionnalités dans l’admin de WordPress ( formulaire de contact y compris ) ne nécessitent pas l’adjonction de plugins supplémentaires.

## Typographie
Le site repose sur un travail typographique soigné. Il n’a cependant pas recours aux web-fonts.
À la place, il utilise, pour les polices **sans sérif**, un *system font stack* ( on utilise par défaut la police du système d’exploitation ) :

```	css
--global--font-primary:  -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", sans-serif;
```

Les polices **monospace** sont rendus grâce à un recours à des *safe fonts* ( polices très répandues sur les terminaux des utilisateurs, quels qu’ils soient ) :

```css
--global--font-secondary: Menlo, Consolas, Monaco, Liberation Mono, Lucida Console, monospace;
```


## Iconographie
Il est fait recours autant que possible aux images en svg. Celles-ci sont chargées grâce à un *sprite cheet* unique.
Le choix d’images matricielles traité en duotone permet de réduire le poids initial des images et de pousser plus loin leur compression ( avec dégradation ) sans que cela soir visible dans le rendu final.

## CSS/HTML

Avoir une bonne logique sémantique du HTML et un *design system* permet de limiter la taille du CSS notamment pour les *media queries*. Le CSS est structuré de manière à être le plus réutilisable possible tout en gardant une bonne maintenabilité.

On recourt aux ```div```  uniquement quand cela est nécessaire.
Résultat, les pages comprennent peu d’éléments du DOM. Ce qui favorise l’accessibilité et la lisibilité pour les robots tout en allégeant le traitement de l’affichage des pages par les navigateurs. 

## Javascript

Le javascript n'est pas utilisé sur ce site. JQuery est désactivé par défaut dans le thème.
