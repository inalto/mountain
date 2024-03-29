<?php
return [
    "accepted" => "Vous devez accepter :attribute.",
    "active_url" => ":attribute n'est pas une URL valide.",
    "after" => ":attribute doit être une date ultérieure à :date.",
    "after_or_equal" => ":attribute doit être une date postérieure ou égale :date.",
    "alpha" => ":attribute ne peut contenir que des lettres.",
    "alpha_dash" => ":attribute ne peut contenir que des lettres, chiffres et tirets.",
    "alpha_num" => ":attribute ne peut contenir que des lettres et chiffres.",
    "array" => ":attribute doit être un tableau.",
    "before" => ":attribute doit être une date antérieure à :date.",
    "before_or_equal" => ":attribute doit être une date postérieure ou égale  à :date.",
    "between" => [
        "array" => ":attribute doit être compris en :min et :max items.",
        "file" => ":attribute doit être compris entre :min et :max kilobytes.",
        "numeric" => ":attribute doit être compris entre :min et :max.",
        "string" => ":attribute doit être compris en :min et :max caractères."
    ],
    "boolean" => ":attribute doit être \"Vrai\" ou \"Faux\".",
    "confirmed" => "La confirmation :attribute ne correspond pas.",
    "custom" => ["attribute-name" => ["rule-name" => "custom-message"]],
    "date" => ":attribute n'est pas une date valide.",
    "date_equals" => ":attribut doit être une date égale à :date.",
    "date_format" => ":attribute ne correspond pas au format :format.",
    "db_column" => ":attribute doit seulement contenir des lettres de l'alphabet Latin ISO basic, nombres, tiret et ne peut commencer par un nombre.",
    "different" => ":attribute et :other doivent être différents.",
    "digits" => ":attribute doit un nombre de type :digit.",
    "digits_between" => "La valeur du nombre :attribute doit être comprise entre :min et :max.",
    "dimensions" => "Les dimensions de l'image :attribute ne sont pas valides.",
    "distinct" => "Le champ :attribute comporte une valeur en double",
    "dont_allow_first_letter_number" => "Le champ  \":input\"  ne peut pas commencer par un chiffre",
    "email" => ":attribute doit être une adresse e-mail valide",
    "ends_with" => ":attribut doit se terminer par l'un des éléments following:: valeurs.",
    "exceeds_maximum_number" => "L'attribut sélectionné n'est pas valide.",
    "exists" => ":attribute n'est pas valide",
    "file" => ":attribute doit être un fichier",
    "filled" => "Le champ :attribute est requis",
    "gt" => [
        "array" => ":attribute doit avoir plus que :value items.",
        "file" => ":attribute doit être plus grand que :value kilobytes.",
        "numeric" => ":attribute doit être plus grand que :value.",
        "string" => ":attribute doit être plus grand que :value characters."
    ],
    "gte" => [
        "array" => ":attribute doit avoir :value items ou plus",
        "file" => ":attribute doit être plus grand que ou égal :value kilobytes.",
        "numeric" => ":attribute doit être plus grand que ou égal :value.",
        "string" => ":attribute doit être plus grand que ou égal :value characters."
    ],
    "image" => ":attribute doit être une image",
    "in" => "La selection :attribute est invalide",
    "in_array" => ":attribute champ n'existe pas dans :other",
    "integer" => ":attribute doit être un entier.",
    "ip" => ":attribute doit être une ip valide",
    "ipv4" => ":attribute doit être une ip V4 valide",
    "ipv6" => ":attribute doit être une ip V6 valide",
    "json" => ":attribute doit être une chaine de caractère JSON valide",
    "latin" => ":attribute doit seulement contenir des lettres de l'alphabet Latin ISO basic.",
    "latin_dash_space" => ":attribute doit seulement contenir des lettres de l'alphabet Latin ISO basic, nombres, tiret, trait d'union et espaces.",
    "lt" => [
        "array" => ":attribute doit avoir moins que :value items.",
        "file" => ":attribute doit être moins que :value kilobytes.",
        "numeric" => ":attribute doit être moins que :value.",
        "string" => ":attribute doit être moins que :value characters."
    ],
    "lte" => [
        "array" => ":attribute ne doit pas avoir plus que :value items.",
        "file" => ":attribute doit être moins que ou égal :value kilobytes.",
        "numeric" => ":attribute doit être moins que ou égal :value.",
        "string" => ":attribute doit être moins que ou égal :value characters."
    ],
    "max" => [
        "array" => ":attribute ne doit pas avoir plus que :max items.",
        "file" => ":attribute ne doit pas être plus grand que :max kilobytes.",
        "numeric" => ":attribute ne peut pas être plus grand que :max.",
        "string" => ":attribute ne peut pas être plus grand que :max characters."
    ],
    "mimes" => ":attribute doit être un fichier de type: :values.",
    "mimetypes" => ":attribute doit être un fichier de type: :values.",
    "min" => [
        "array" => ":attribute doit avoir au minimum :min items.",
        "file" => ":attribute doit être au minimum :min kilobytes.",
        "numeric" => ":attribute doit être au minimum :min.",
        "string" => ":attribute doit être au moins :min caractères."
    ],
    "not_in" => "La selection :attribute est invalide.",
    "not_regex" => "Le format :attribute est invalide.",
    "numeric" => ":attribute doit être un nombre",
    "password" => "Le mot de passe est incorrect",
    "present" => ":attribute champ doit être présent.",
    "regex" => ":attribute n'est pas au bon format",
    "required" => ":attribute champ est recquis.",
    "required_if" => ":attribute champ est recquis lorsque :other est :value.",
    "required_unless" => ":attribute champ est recquis à moins que :other est dans :values.",
    "required_with" => ":attribute champ est recquis lorsque :values est présent.",
    "required_with_all" => ":attribute champ est recquis lorsque :values est présent.",
    "required_without" => ":attribute champ est recquis lorsque :values n'est pas présent.",
    "required_without_all" => ":attribute champ est recquis lorsque aucun de :values sont présents",
    "reserved_word" => ":attribute contient un mot réservé.",
    "same" => ":attribute et :other doivent correspondre.",
    "size" => [
        "array" => ":attribute doit contenir :size items.",
        "file" => ":attribute doit être :size kilobytes.",
        "numeric" => ":attribute doit être :size.",
        "string" => ":attribute doit être :size characters."
    ],
    "starts_with" => ":attribut doit commencer par l'un des éléments following::values.",
    "string" => ":attribute doit être une chaine de caractères",
    "timezone" => ":attribute doit être une zone valide.",
    "unique" => ":attribute a déjà été pris.",
    "uploaded" => ":attribute échéc de l'upload",
    "url" => ":attribute au format invalide",
    "uuid" => ":attribut doit être un UUID valide."
];
