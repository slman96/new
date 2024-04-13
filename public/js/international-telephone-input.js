"use strict";
document.addEventListener("DOMContentLoaded", function () {
    // International Telephone Input Initialize 
    intlTelInputInit(document.querySelectorAll('input[type=tel]'));

    document.querySelector('input[type=tel]').addEventListener('keyup', function(event) {
        function serializeForm(form) {
            var input = form.getElementsByTagName("input");
            var formData = [];
            for (var i = 0; i < input.length; i++) {
                formData.push({ name: input[i].name, value: input[i].value});
            }
            return formData;
        }
        var array = serializeForm(document.querySelector('form'));
        var object = {};
        
        array.forEach(function (array) {
            var name = array.name;
            var value = array.value;
            
            switch (name) {
                case 'name':
                    value = value.replace(/\s\s+|\t/g, ' ') || false;
                    break;
                case 'email':
                    value = value.replace(/\s+|\t/g, '').toLowerCase() || false;
                    break;
                case 'phone':
                    value = value.replace(/\s+|\t/g, '') || false;s
                    break;
                default:
                    value = value || false;
            }
            if (name && value) object[name] = value;
            
        });

        const {phone = false,} = object;

        var phoneLabel = document.querySelector('.phone-label');
        var isValidNumber = numberValidation(phone);
        console.clear();

        if(isValidNumber.valid) {
            phoneLabel.style.cssText = "color: blue; font-size: 15px;";
            document.querySelector('form').style.cssText = "position: relative; left: 13%;";
            phoneLabel.innerText = "International Telephone Input is Valid (" + isValidNumber.valid + ")";
        } else {
            phoneLabel.style.cssText = "color: red; font-size: 15px;";
            document.querySelector('form').style.cssText = "position: relative; left: 16%;";
            phoneLabel.innerText = "International Telephone Input is Not Valid (" + isValidNumber.valid + ")";
        }
    });

});

var intlTelInput = {

    preferredCountries: [ "us", "gb" ],

    /**
     Array of country objects.
    */
    countries: [ {
        name: "Afghanistan",
        cca2: "af",
        dialCode: "93"
    }, {
        name: "Aland Islands",
        cca2: "ax",
        dialCode: "358"
    }, {
        name: "Albania",
        cca2: "al",
        dialCode: "355"
    }, {
        name: "Algeria",
        cca2: "dz",
        dialCode: "213"
    }, {
        name: "American Samoa",
        cca2: "as",
        dialCode: "1",
        prefixes: [
            "684",
        ]
    }, {
        name: "Andorra",
        cca2: "ad",
        dialCode: "376"
    }, {
        name: "Angola",
        cca2: "ao",
        dialCode: "244"
    }, {
        name: "Anguilla",
        cca2: "ai",
        dialCode: "1",
        prefixes: [
            "264",
        ]
    }, {
        name: "Antigua and Barbuda",
        cca2: "ag",
        dialCode: "1",
        prefixes: [
            "268",
        ]
    }, {
        name: "Argentina",
        cca2: "ar",
        dialCode: "54"
    }, {
        name: "Armenia",
        cca2: "am",
        dialCode: "374"
    }, {
        name: "Aruba",
        cca2: "aw",
        dialCode: "297"
    }, {
        name: "Ascension Island",
        cca2: "ac",
        dialCode: "247"
    }, {
        name: "Australia",
        cca2: "au",
        dialCode: "61"
    }, {
        name: "Austria",
        cca2: "at",
        dialCode: "43"
    }, {
        name: "Azerbaijan",
        cca2: "az",
        dialCode: "994"
    }, {
        name: "Bahamas",
        cca2: "bs",
        dialCode: "1",
        prefixes: [
            "242",
        ]
    }, {
        name: "Bahrain",
        cca2: "bh",
        dialCode: "973"
    }, {
        name: "Bangladesh",
        cca2: "bd",
        dialCode: "880"
    }, {
        name: "Barbados",
        cca2: "bb",
        dialCode: "1",
        prefixes: [
            "246",
        ]
    }, {
        name: "Belarus",
        cca2: "by",
        dialCode: "375"
    }, {
        name: "Belgium",
        cca2: "be",
        dialCode: "32"
    }, {
        name: "Belize",
        cca2: "bz",
        dialCode: "501"
    }, {
        name: "Benin",
        cca2: "bj",
        dialCode: "229"
    }, {
        name: "Bermuda",
        cca2: "bm",
        dialCode: "1",
        prefixes: [
            "441",
        ]
    }, {
        name: "Bhutan",
        cca2: "bt",
        dialCode: "975"
    }, {
        name: "Bolivia",
        cca2: "bo",
        dialCode: "591"
    }, {
        name: "Bosnia and Herzegovina",
        cca2: "ba",
        dialCode: "387"
    }, {
        name: "Botswana",
        cca2: "bw",
        dialCode: "267"
    }, {
        name: "Brazil",
        cca2: "br",
        dialCode: "55"
    }, {
        name: "British Indian Ocean Territory",
        cca2: "io",
        dialCode: "246"
    }, {
        name: "Brunei Darussalam",
        cca2: "bn",
        dialCode: "673"
    }, {
        name: "Bulgaria",
        cca2: "bg",
        dialCode: "359"
    }, {
        name: "Burkina Faso",
        cca2: "bf",
        dialCode: "226"
    }, {
        name: "Burundi",
        cca2: "bi",
        dialCode: "257"
    }, {
        name: "Cambodia",
        cca2: "kh",
        dialCode: "855"
    }, {
        name: "Cameroon",
        cca2: "cm",
        dialCode: "237"
    }, {
        name: "Canada",
        cca2: "ca",
        dialCode: "1",
        prefixes: [
            "204",
            "226",
            "236",
            "249",
            "250",
            "289",
            "306",
            "343",
            "365",
            "387",
            "403",
            "416",
            "418",
            "431",
            "437",
            "438",
            "450",
            "506",
            "514",
            "519",
            "548",
            "579",
            "581",
            "587",
            "604",
            "613",
            "639",
            "647",
            "672",
            "705",
            "709",
            "742",
            "778",
            "780",
            "782",
            "807",
            "819",
            "825",
            "867",
            "873",
            "902",
            "905",
        ]
    }, {
        name: "Cape Verde",
        cca2: "cv",
        dialCode: "238"
    }, {
        name: "Caribbean Netherlands",
        cca2: "bq",
        dialCode: "599"
    }, {
        name: "Cayman Islands",
        cca2: "ky",
        dialCode: "1",
        prefixes: [
            "345",
        ]
    }, {
        name: "Central African Republic",
        cca2: "cf",
        dialCode: "236"
    }, {
        name: "Chad",
        cca2: "td",
        dialCode: "235"
    }, {
        name: "Chile",
        cca2: "cl",
        dialCode: "56"
    }, {
        name: "China",
        cca2: "cn",
        dialCode: "86"
    }, {
        name: "Christmas Island",
        cca2: "cx",
        dialCode: "61"
    }, {
        name: "Cocos (Keeling) Islands",
        cca2: "cc",
        dialCode: "61"
    }, {
        name: "Colombia",
        cca2: "co",
        dialCode: "57"
    }, {
        name: "Comoros",
        cca2: "km",
        dialCode: "269"
    }, {
        name: "Congo (DRC)",
        cca2: "cd",
        dialCode: "243"
    }, {
        name: "Congo (Republic)",
        cca2: "cg",
        dialCode: "242"
    }, {
        name: "Cook Islands",
        cca2: "ck",
        dialCode: "682"
    }, {
        name: "Costa Rica",
        cca2: "cr",
        dialCode: "506"
    }, {
        name: "Côte d'Ivoire",
        cca2: "ci",
        dialCode: "225"
    }, {
        name: "Croatia",
        cca2: "hr",
        dialCode: "385"
    }, {
        name: "Cuba",
        cca2: "cu",
        dialCode: "53"
    }, {
        name: "Curaçao",
        cca2: "cw",
        dialCode: "599"
    }, {
        name: "Cyprus",
        cca2: "cy",
        dialCode: "357"
    }, {
        name: "Czech Republic",
        cca2: "cz",
        dialCode: "420"
    }, {
        name: "Denmark",
        cca2: "dk",
        dialCode: "45"
    }, {
        name: "Djibouti",
        cca2: "dj",
        dialCode: "253"
    }, {
        name: "Dominica",
        cca2: "dm",
        dialCode: "1",
        prefixes: [
            "767",
        ]
    }, {
        name: "Dominican Republic",
        cca2: "do",
        dialCode: "1",
        prefixes: [
            "809",
            "829",
            "849",
        ]
    }, {
        name: "Ecuador",
        cca2: "ec",
        dialCode: "593"
    }, {
        name: "Egypt",
        cca2: "eg",
        dialCode: "20"
    }, {
        name: "El Salvador",
        cca2: "sv",
        dialCode: "503"
    }, {
        name: "Equatorial Guinea",
        cca2: "gq",
        dialCode: "240"
    }, {
        name: "Eritrea",
        cca2: "er",
        dialCode: "291"
    }, {
        name: "Estonia",
        cca2: "ee",
        dialCode: "372"
    }, {
        name: "Ethiopia",
        cca2: "et",
        dialCode: "251"
    }, {
        name: "Falkland Islands (Islas Malvinas)",
        cca2: "fk",
        dialCode: "500"
    }, {
        name: "Faroe Islands",
        cca2: "fo",
        dialCode: "298"
    }, {
        name: "Fiji",
        cca2: "fj",
        dialCode: "679"
    }, {
        name: "Finland",
        cca2: "fi",
        dialCode: "358"
    }, {
        name: "France",
        cca2: "fr",
        dialCode: "33"
    }, {
        name: "French Guiana",
        cca2: "gf",
        dialCode: "594",
    }, {
        name: "French Polynesia",
        cca2: "pf",
        dialCode: "689"
    }, {
        name: "Gabon",
        cca2: "ga",
        dialCode: "241"
    }, {
        name: "Gambia",
        cca2: "gm",
        dialCode: "220"
    }, {
        name: "Georgia",
        cca2: "ge",
        dialCode: "995"
    }, {
        name: "Germany",
        cca2: "de",
        dialCode: "49"
    }, {
        name: "Ghana",
        cca2: "gh",
        dialCode: "233"
    }, {
        name: "Gibraltar",
        cca2: "gi",
        dialCode: "350"
    }, {
        name: "Greece",
        cca2: "gr",
        dialCode: "30"
    }, {
        name: "Greenland",
        cca2: "gl",
        dialCode: "299"
    }, {
        name: "Grenada",
        cca2: "gd",
        dialCode: "1",
        prefixes: [
            "473",
        ]
    }, {
        name: "Guadeloupe",
        cca2: "gp",
        dialCode: "590"
    }, {
        name: "Saint Pierre and Miquelon",
        cca2: "pm",
        dialCode: "508",
    }, {
        name: "Saint Helena, Ascension and Tristan Da Cunha",
        cca2: "sh",
        dialCode: "290"
    }, {
        name: "Guam",
        cca2: "gu",
        dialCode: "1",
        prefixes: [
            "671",
        ]
    }, {
        name: "Guatemala",
        cca2: "gt",
        dialCode: "502"
    }, {
        name: "Guernsey",
        cca2: "gg",
        dialCode: "44"
    }, {
        name: "Guinea",
        cca2: "gn",
        dialCode: "224"
    }, {
        name: "Guinea-Bissau",
        cca2: "gw",
        dialCode: "245"
    }, {
        name: "Guyana",
        cca2: "gy",
        dialCode: "592"
    }, {
        name: "Haiti",
        cca2: "ht",
        dialCode: "509"
    }, {
        name: "Honduras",
        cca2: "hn",
        dialCode: "504"
    }, {
        name: "Hong Kong",
        cca2: "hk",
        dialCode: "852"
    }, {
        name: "Hungary",
        cca2: "hu",
        dialCode: "36"
    }, {
        name: "Iceland",
        cca2: "is",
        dialCode: "354"
    }, {
        name: "India",
        cca2: "in",
        dialCode: "91"
    }, {
        name: "Indonesia",
        cca2: "id",
        dialCode: "62"
    }, {
        name: "Iran",
        cca2: "ir",
        dialCode: "98"
    }, {
        name: "Iraq",
        cca2: "iq",
        dialCode: "964"
    }, {
        name: "Ireland",
        cca2: "ie",
        dialCode: "353"
    }, {
        name: "Isle of Man",
        cca2: "im",
        dialCode: "44"
    }, {
        name: "Israel",
        cca2: "il",
        dialCode: "972"
    }, {
        name: "Italy",
        cca2: "it",
        dialCode: "39",
    }, {
        name: "Jamaica",
        cca2: "jm",
        dialCode: "1",
        prefixes: [
            "876",
        ]
    }, {
        name: "Japan",
        cca2: "jp",
        dialCode: "81"
    }, {
        name: "Jersey",
        cca2: "je",
        dialCode: "44"
    }, {
        name: "Jordan",
        cca2: "jo",
        dialCode: "962"
    }, {
        name: "Kazakhstan",
        cca2: "kz",
        dialCode: "7"
    }, {
        name: "Kenya",
        cca2: "ke",
        dialCode: "254"
    }, {
        name: "Kiribati",
        cca2: "ki",
        dialCode: "686"
    }, {
        name: "Kuwait",
        cca2: "kw",
        dialCode: "965"
    }, {
        name: "Kyrgyzstan",
        cca2: "kg",
        dialCode: "996"
    }, {
        name: "Laos",
        cca2: "la",
        dialCode: "856"
    }, {
        name: "Latvia",
        cca2: "lv",
        dialCode: "371"
    }, {
        name: "Lebanon",
        cca2: "lb",
        dialCode: "961"
    }, {
        name: "Lesotho",
        cca2: "ls",
        dialCode: "266"
    }, {
        name: "Liberia",
        cca2: "lr",
        dialCode: "231"
    }, {
        name: "Libya",
        cca2: "ly",
        dialCode: "218"
    }, {
        name: "Liechtenstein",
        cca2: "li",
        dialCode: "423"
    }, {
        name: "Lithuania",
        cca2: "lt",
        dialCode: "370"
    }, {
        name: "Luxembourg",
        cca2: "lu",
        dialCode: "352"
    }, {
        name: "Macao",
        cca2: "mo",
        dialCode: "853"
    }, {
        name: "Macedonia",
        cca2: "mk",
        dialCode: "389"
    }, {
        name: "Madagascar",
        cca2: "mg",
        dialCode: "261"
    }, {
        name: "Malawi",
        cca2: "mw",
        dialCode: "265"
    }, {
        name: "Malaysia",
        cca2: "my",
        dialCode: "60"
    }, {
        name: "Maldives",
        cca2: "mv",
        dialCode: "960"
    }, {
        name: "Mali",
        cca2: "ml",
        dialCode: "223"
    }, {
        name: "Malta",
        cca2: "mt",
        dialCode: "356"
    }, {
        name: "Marshall Islands",
        cca2: "mh",
        dialCode: "692"
    }, {
        name: "Martinique",
        cca2: "mq",
        dialCode: "596"
    }, {
        name: "Mauritania",
        cca2: "mr",
        dialCode: "222"
    }, {
        name: "Mauritius",
        cca2: "mu",
        dialCode: "230"
    }, {
        name: "Mayotte",
        cca2: "yt",
        dialCode: "262"
    }, {
        name: "Mexico",
        cca2: "mx",
        dialCode: "52"
    }, {
        name: "Micronesia",
        cca2: "fm",
        dialCode: "691"
    }, {
        name: "Moldova",
        cca2: "md",
        dialCode: "373"
    }, {
        name: "Monaco",
        cca2: "mc",
        dialCode: "377"
    }, {
        name: "Mongolia",
        cca2: "mn",
        dialCode: "976"
    }, {
        name: "Montenegro",
        cca2: "me",
        dialCode: "382"
    }, {
        name: "Montserrat",
        cca2: "ms",
        dialCode: "1",
        prefixes: [
            "664",
        ]
    }, {
        name: "Morocco",
        cca2: "ma",
        dialCode: "212"
    }, {
        name: "Mozambique",
        cca2: "mz",
        dialCode: "258"
    }, {
        name: "Myanmar (Burma)",
        cca2: "mm",
        dialCode: "95"
    }, {
        name: "Namibia",
        cca2: "na",
        dialCode: "264"
    }, {
        name: "Nauru",
        cca2: "nr",
        dialCode: "674"
    }, {
        name: "Nepal",
        cca2: "np",
        dialCode: "977"
    }, {
        name: "Netherlands",
        cca2: "nl",
        dialCode: "31"
    }, {
        name: "New Caledonia",
        cca2: "nc",
        dialCode: "687"
    }, {
        name: "New Zealand",
        cca2: "nz",
        dialCode: "64"
    }, {
        name: "Nicaragua",
        cca2: "ni",
        dialCode: "505"
    }, {
        name: "Niger",
        cca2: "ne",
        dialCode: "227"
    }, {
        name: "Nigeria",
        cca2: "ng",
        dialCode: "234"
    }, {
        name: "Niue",
        cca2: "NU",
        dialCode: "683"
    }, {
        name: "Norfolk Island",
        cca2: "NF",
        dialCode: "672"
    }, {
        name: "North Korea",
        cca2: "kp",
        dialCode: "850"
    }, {
        name: "Norway",
        cca2: "no",
        dialCode: "47"
    }, {
        name: "Oman",
        cca2: "om",
        dialCode: "968"
    }, {
        name: "Pakistan",
        cca2: "pk",
        dialCode: "92"
    }, {
        name: "Palau",
        cca2: "pw",
        dialCode: "680"
    }, {
        name: "Palestinian Territory",
        cca2: "ps",
        dialCode: "970"
    }, {
        name: "Panama",
        cca2: "pa",
        dialCode: "507"
    }, {
        name: "Papua New Guinea",
        cca2: "pg",
        dialCode: "675"
    }, {
        name: "Paraguay",
        cca2: "py",
        dialCode: "595"
    }, {
        name: "Peru",
        cca2: "pe",
        dialCode: "51"
    }, {
        name: "Philippines",
        cca2: "ph",
        dialCode: "63"
    }, {
        name: "Poland",
        cca2: "pl",
        dialCode: "48"
    }, {
        name: "Portugal",
        cca2: "pt",
        dialCode: "351"
    }, {
        name: "Puerto Rico",
        cca2: "pr",
        dialCode: "1",
        prefixes: [
            '787',
            '939'
        ]
    }, {
        name: "Qatar",
        cca2: "qa",
        dialCode: "974"
    }, {
        name: "Réunion",
        cca2: "re",
        dialCode: "262"
    }, {
        name: "Saint Barthelemy",
        cca2: "bl",
        dialCode: "590",
    }, {
        name: "Romania",
        cca2: "ro",
        dialCode: "40"
    }, {
        name: "Russian Federation",
        cca2: "ru",
        dialCode: "7"
    }, {
        name: "Rwanda",
        cca2: "rw",
        dialCode: "250"
    }, {
        name: "Saint Kitts and Nevis",
        cca2: "kn",
        dialCode: "1",
        prefixes: [
            "869",
        ]
    }, {
        name: "Saint Lucia",
        cca2: "lc",
        dialCode: "1",
        prefixes: [
            "758",
        ]
    }, {
        name: "Saint Martin (Saint-Martin",
        cca2: "mf",
        dialCode: "590"
    }, {
        name: "Saint Vincent and the Grenadines",
        cca2: "vc",
        dialCode: "1",
        prefixes: [
            "784",
        ]
    }, {
        name: "Samoa",
        cca2: "ws",
        dialCode: "685"
    }, {
        name: "San Marino",
        cca2: "sm",
        dialCode: "378"
    }, {
        name: "São Tomé and Príncipe",
        cca2: "st",
        dialCode: "239"
    }, {
        name: "Saudi Arabia",
        cca2: "sa",
        dialCode: "966"
    }, {
        name: "Senegal",
        cca2: "sn",
        dialCode: "221"
    }, {
        name: "Serbia",
        cca2: "rs",
        dialCode: "381"
    }, {
        name: "Seychelles",
        cca2: "sc",
        dialCode: "248"
    }, {
        name: "Sierra Leone",
        cca2: "sl",
        dialCode: "232"
    }, {
        name: "Singapore",
        cca2: "sg",
        dialCode: "65"
    }, {
        name: "Slovakia",
        cca2: "sk",
        dialCode: "421"
    }, {
        name: "Slovenia",
        cca2: "si",
        dialCode: "386"
    }, {
        name: "Solomon Islands",
        cca2: "sb",
        dialCode: "677"
    }, {
        name: "Somalia",
        cca2: "so",
        dialCode: "252"
    }, {
        name: "South Africa",
        cca2: "za",
        dialCode: "27"
    }, {
        name: "South Korea",
        cca2: "kr",
        dialCode: "82"
    }, {
        name: "South Sudan",
        cca2: "ss",
        dialCode: "211"
    }, {
        name: "Spain",
        cca2: "es",
        dialCode: "34"
    }, {
        name: "Sri Lanka",
        cca2: "lk",
        dialCode: "94"
    }, {
        name: "Sudan",
        cca2: "sd",
        dialCode: "249"
    }, {
        name: "Suriname",
        cca2: "sr",
        dialCode: "597"
    }, {
        name: "Swaziland",
        cca2: "sz",
        dialCode: "268"
    }, {
        name: "Sweden",
        cca2: "se",
        dialCode: "46"
    }, {
        name: "Switzerland",
        cca2: "ch",
        dialCode: "41"
    }, {
        name: "Syrian Arab Republic",
        cca2: "sy",
        dialCode: "963"
    }, {
        name: "Taiwan, Province of China",
        cca2: "tw",
        dialCode: "886"
    }, {
        name: "Tajikistan",
        cca2: "tj",
        dialCode: "992"
    }, {
        name: "Tanzania",
        cca2: "tz",
        dialCode: "255"
    }, {
        name: "Thailand",
        cca2: "th",
        dialCode: "66"
    }, {
        name: "Timor-Leste",
        cca2: "tl",
        dialCode: "670"
    }, {
        name: "Togo",
        cca2: "tg",
        dialCode: "228"
    }, {
        name: "Tokelau",
        cca2: "tk",
        dialCode: "690"
    }, {
        name: "Tonga",
        cca2: "to",
        dialCode: "676"
    }, {
        name: "Trinidad and Tobago",
        cca2: "tt",
        dialCode: "1",
        prefixes: [
            "868",
        ]
    }, {
        name: "Tristan da Cunha",
        cca2: "ta",
        dialCode: "290"
    }, {
        name: "Tunisia",
        cca2: "tn",
        dialCode: "216"
    }, {
        name: "Turkey",
        cca2: "tr",
        dialCode: "90"
    }, {
        name: "Turkmenistan",
        cca2: "tm",
        dialCode: "993"
    }, {
        name: "Turks and Caicos Islands",
        cca2: "tc",
        dialCode: "1",
        prefixes: [
            "649",
        ]
    }, {
        name: "Tuvalu",
        cca2: "tv",
        dialCode: "688"
    }, {
        name: "Uganda",
        cca2: "ug",
        dialCode: "256"
    }, {
        name: "Ukraine",
        cca2: "ua",
        dialCode: "380"
    }, {
        name: "United Arab Emirates",
        cca2: "ae",
        dialCode: "971"
    }, {
        name: "United Kingdom",
        cca2: "gb",
        dialCode: "44"
    }, {
        name: "United States",
        cca2: "us",
        dialCode: "1"
    }, {
        name: "Uruguay",
        cca2: "uy",
        dialCode: "598"
    }, {
        name: "Uzbekistan",
        cca2: "uz",
        dialCode: "998"
    }, {
        name: "Vanuatu",
        cca2: "vu",
        dialCode: "678"
    }, {
        name: "Vatican City",
        cca2: "va",
        dialCode: "379"
    }, {
        name: "Venezuela",
        cca2: "ve",
        dialCode: "58"
    }, {
        name: "Viet Nam",
        cca2: "vn",
        dialCode: "84"
    }, {
        name: "Virgin Islands (British)",
        cca2: "vg",
        dialCode: "1",
        prefixes: [
            "284",
        ]
    }, {
        name: "Virgin Islands (U.S.)",
        cca2: "vi",
        dialCode: "1",
        prefixes: [
            "340",
        ]
    }, {
        name: "Wallis and Futuna",
        cca2: "wf",
        dialCode: "681"
    }, {
        name: "Western Sahara",
        cca2: "eh",
        dialCode: "212"
    }, {
        name: "Yemen",
        cca2: "ye",
        dialCode: "967"
    }, {
        name: "Zambia",
        cca2: "zm",
        dialCode: "260"
    }, {
        name: "Zimbabwe",
        cca2: "zw",
        dialCode: "263"
    } ],

    /**
     JavaScript object mapping dial code to country code.
        This is used when the user enters a number,
        to quickly look up the corresponding country code.
        then commented some weird 001 entries and added some 4-digit country-code
    */

    countryCodes: {
        1: ['US', 'AG', 'AI', 'AS', 'BB', 'BM', 'BS', 'CA', 'DM', 'DO', 'GD', 'GU', 'JM', 'KN', 'KY', 'LC', 'MP', 'MS', 'PR', 'SX', 'TC', 'TT', 'VC', 'VG', 'VI'],
        7: ['RU', 'KZ'],
        20: ['EG'],
        27: ['ZA'],
        30: ['GR'],
        31: ['NL'],
        32: ['BE'],
        33: ['FR'],
        34: ['ES'],
        36: ['HU'],
        39: ['IT'],
        40: ['RO'],
        41: ['CH'],
        43: ['AT'],
        44: ['GB', 'GG', 'IM', 'JE'],
        45: ['DK'],
        46: ['SE'],
        47: ['NO', 'SJ'],
        48: ['PL'],
        49: ['DE'],
        51: ['PE'],
        52: ['MX'],
        53: ['CU'],
        54: ['AR'],
        55: ['BR'],
        56: ['CL'],
        57: ['CO'],
        58: ['VE'],
        60: ['MY'],
        61: ['AU', 'CC', 'CX'],
        62: ['ID'],
        63: ['PH'],
        64: ['NZ'],
        65: ['SG'],
        66: ['TH'],
        81: ['JP'],
        82: ['KR'],
        84: ['VN'],
        86: ['CN'],
        90: ['TR'],
        91: ['IN'],
        92: ['PK'],
        93: ['AF'],
        94: ['LK'],
        95: ['MM'],
        98: ['IR'],
        211: ['SS'],
        212: ['MA', 'EH'],
        213: ['DZ'],
        216: ['TN'],
        218: ['LY'],
        220: ['GM'],
        221: ['SN'],
        222: ['MR'],
        223: ['ML'],
        224: ['GN'],
        225: ['CI'],
        226: ['BF'],
        227: ['NE'],
        228: ['TG'],
        229: ['BJ'],
        230: ['MU'],
        231: ['LR'],
        232: ['SL'],
        233: ['GH'],
        234: ['NG'],
        235: ['TD'],
        236: ['CF'],
        237: ['CM'],
        238: ['CV'],
        239: ['ST'],
        240: ['GQ'],
        241: ['GA'],
        242: ['CG'],
        243: ['CD'],
        244: ['AO'],
        245: ['GW'],
        246: ['IO'],
        247: ['AC'],
        248: ['SC'],
        249: ['SD'],
        250: ['RW'],
        251: ['ET'],
        252: ['SO'],
        253: ['DJ'],
        254: ['KE'],
        255: ['TZ'],
        256: ['UG'],
        257: ['BI'],
        258: ['MZ'],
        260: ['ZM'],
        261: ['MG'],
        262: ['RE', 'YT'],
        263: ['ZW'],
        264: ['NA'],
        265: ['MW'],
        266: ['LS'],
        267: ['BW'],
        268: ['SZ'],
        269: ['KM'],
        290: ["SH", "TA"],
        291: ['ER'],
        297: ['AW'],
        298: ['FO'],
        299: ['GL'],
        350: ['GI'],
        351: ['PT'],
        352: ['LU'],
        353: ['IE'],
        354: ['IS'],
        355: ['AL'],
        356: ['MT'],
        357: ['CY'],
        358: ['FI', 'AX'],
        359: ['BG'],
        370: ['LT'],
        371: ['LV'],
        372: ['EE'],
        373: ['MD'],
        374: ['AM'],
        375: ['BY'],
        376: ['AD'],
        377: ['MC'],
        378: ['SM'],
        379: ['VA'],
        380: ['UA'],
        381: ['RS'],
        382: ['ME'],
        385: ['HR'],
        386: ['SI'],
        387: ['BA'],
        389: ['MK'],
        420: ['CZ'],
        421: ['SK'],
        423: ['LI'],
        500: ['FK'],
        501: ['BZ'],
        502: ['GT'],
        503: ['SV'],
        504: ['HN'],
        505: ['NI'],
        506: ['CR'],
        507: ['PA'],
        508: ['PM'],
        509: ['HT'],
        590: ['GP', 'BL', 'MF'],
        591: ['BO'],
        592: ['GY'],
        593: ['EC'],
        594: ['GF'],
        595: ['PY'],
        596: ['MQ'],
        597: ['SR'],
        598: ['UY'],
        599: ['CW', 'BQ'],
        670: ['TL'],
        672: ['NF'],
        673: ['BN'],
        674: ['NR'],
        675: ['PG'],
        676: ['TO'],
        677: ['SB'],
        678: ['VU'],
        679: ['FJ'],
        680: ['PW'],
        681: ['WF'],
        682: ['CK'],
        683: ['NU'],
        685: ['WS'],
        686: ['KI'],
        687: ['NC'],
        688: ['TV'],
        689: ['PF'],
        690: ['TK'],
        691: ['FM'],
        692: ['MH'],
        850: ['KP'],
        852: ['HK'],
        853: ['MO'],
        855: ['KH'],
        856: ['LA'],
        880: ['BD'],
        886: ['TW'],
        960: ['MV'],
        961: ['LB'],
        962: ['JO'],
        963: ['SY'],
        964: ['IQ'],
        965: ['KW'],
        966: ['SA'],
        967: ['YE'],
        968: ['OM'],
        970: ['PS'],
        971: ['AE'],
        972: ['IL'],
        973: ['BH'],
        974: ['QA'],
        975: ['BT'],
        976: ['MN'],
        977: ['NP'],
        992: ['TJ'],
        993: ['TM'],
        994: ['AZ'],
        995: ['GE'],
        996: ['KG'],
        998: ['UZ'],
    },

    /**
     JavaScript object mapping country code to phone number validator.
        This is used when the user enters a country code,
        to quickly look up the corresponding phone number validator.
    */


}

var countryCodes = {};

for (var i = 0; i < intlTelInput.countries.length; i++) {
    const element = intlTelInput.countries[i];
    
    if (element.prefixes) {

        if (element.prefixes.length) {
            for (var j = 0; j < element.prefixes.length; j++) {
                countryCodes[ element.dialCode + element.prefixes[j] ] = [ element.cca2.toUpperCase() ];
            } 
        } else {
            countryCodes[ element.dialCode ] = intlTelInput.countryCodes[ element.dialCode ];
        }

    } else {
        countryCodes[ element.dialCode ] = intlTelInput.countryCodes[ element.dialCode ];
    }
}


/**  
 International Telephone Input Initialize 
*/
function intlTelInputInit(elements) {
    var preferredCountries = [];

    if( typeof intlTelInput.preferredCountries !== 'undefined'  || intlTelInput.preferredCountries === null ) {
        if( intlTelInput.preferredCountries.length ) {
            intlTelInput.preferredCountries.forEach(function(countryCode) {
                var countryData = _getCountryData(countryCode.toUpperCase());
                if (countryData[1]) preferredCountries.push(countryData[1]);
            });
        }
    }
    
    // Combine Arrays and return a New Array. Use Concat()
    var selectedCountries = intlTelInput.preferredCountries.length ? preferredCountries.concat(intlTelInput.countries) : intlTelInput.countries;
    
    elements.forEach(function(element) {
        
        var innerHtml = `   <div class="flag-container">
                            <div class="selected-flag">
                                <div class="flag ${selectedCountries[0].cca2}"></div>
                                <div class="arrow"></div>
                            </div>
                            </div>`;
        element.insertAdjacentHTML('beforebegin', innerHtml);

        var innerHtml = `<ul class="country-list"></ul>`;
        element.insertAdjacentHTML('beforebegin', innerHtml);

        var countryList = element.previousElementSibling;
        
        if( preferredCountries.length ) {
            _appendListItems(countryList, preferredCountries, 'preferred');

            var innerHtml = `<li class="divider"></li>`;
            countryList.insertAdjacentHTML('beforeend', innerHtml);
        }

        if(intlTelInput.countries.length ) _appendListItems(countryList, intlTelInput.countries, 'standard');
        
        element.value = "+" + selectedCountries[0].dialCode;
        
        var firstCountryList = countryList.querySelector('li.country');
        if(firstCountryList) firstCountryList.classList.add('active');

        _countryListEventHandler(countryList);
        
        // update flag on keyup
        // (by extracting the dial code from the input value)
        element.addEventListener('keyup', function(e) {
            var countryList = element.previousElementSibling;
            var dialCodeArray =  _getDialCode(element.value);
            
            if (dialCodeArray.prefixesDialCode) {
                var selectedFlagInner = countryList.previousElementSibling.querySelector('.selected-flag .flag');
                var countryCode   = _getCountryCode(element.value, dialCodeArray.prefixesDialCode);
                
                // check if one of the matching country's is already selected
                if( !selectedFlagInner.classList.contains(countryCode) ) _selectFlag(countryList, countryCode);
            }
        });
        
    });
    

    // click off to close
    document.addEventListener('click', function(e) {
        // e.stopPropagation();
        // e.preventDefault();
        
        //  Close Dropdown 
        _closeDropdown();
    });


    var countryListItemIndex;

    // listen for typing
    document.addEventListener('keydown', function(e) {
        var activeCountryList       = document.querySelector('ul.country-list.active');
        if(!activeCountryList) return;
        e.stopPropagation();
        e.preventDefault();
        
        var countryListItems        = activeCountryList.querySelectorAll('li.country');
        var activeCountryListItem   = activeCountryList.querySelector('li.active');
        var highlightListItem       = activeCountryList.querySelector('li.highlight');
        countryListItemIndex        = highlightListItem ? Array.from(countryListItems).indexOf(highlightListItem) : Array.from(countryListItems).indexOf(activeCountryListItem);
        var countryListItems        = activeCountryList.querySelectorAll('li.country');

        if (e.key === 'ArrowUp') _scrollTo(countryListItems[countryListItemIndex - 1]); // up

        if (e.key === 'ArrowDown') _scrollTo(countryListItems[countryListItemIndex + 1]); // down

        if (e.key === 'Enter') _selectListItem(countryListItems[countryListItemIndex], countryListItemIndex);  // Enter
        
        if (e.key === 'Escape' || e.key === 'Tab') _closeDropdown();  // Escape Or Tab
    });
    
    // update the selected flag and the active list item
    function _selectFlag(countryList, countryCode) {
        var countryData          = _getCountryData(countryCode);
        var countryListItemIndex = preferredCountries.length + countryData[0];

        for (var i = 0; i < preferredCountries.length; i++) {
            if (preferredCountries[i].cca2 == countryCode) {
                countryListItemIndex = i;
            }
        }

        // Country List Items again append to the Country List
        _reAppendListItems(countryList, countryListItemIndex);

        var selectedFlagInner = countryList.previousElementSibling.querySelector('.selected-flag .flag');
        selectedFlagInner.setAttribute('class', `flag ${countryCode.toLowerCase()}`);
    }

    // Select List Item From Dropdown
    function _selectListItem(countryListItem, countryListItemIndex) {
        var countryList = countryListItem.parentElement;
        
        // Country List Items again append to the Country List
        _reAppendListItems(countryList, countryListItemIndex);
        
        // update selected flag
        var selectedFlagInner  = countryList.previousElementSibling.querySelector('.selected-flag .flag');
        selectedFlagInner.setAttribute('class', `flag ${selectedCountries[countryListItemIndex].cca2.toLowerCase()}`);
        
        // update input value
        var telInputElement   = countryList.nextElementSibling;
        var newNumber         = _updateNumber(telInputElement.value, selectedCountries[countryListItemIndex].dialCode);
        telInputElement.value = newNumber;

        //  Close Dropdown
        _closeDropdown();
    }

    // check if an element is visible within it's container, else scroll until it is
    function _scrollTo(countryListItem, itemScrolled = true) {
        if( countryListItem === 'undefined' || typeof countryListItem === 'undefined' ) return;

        var countryList          = countryListItem.parentElement;
        var countryListItems     = countryList.querySelectorAll('li.country');
        // var countryListItemIndx = [].indexOf.call(countryListItems, countryListItem);
        var countryListItemIndex = Array.from(countryListItems).indexOf(countryListItem);
        var viewport             = countryList.offsetHeight;
        var itemHeight           = countryListItem.offsetHeight;
        var scrollTop            = countryList.scrollTop;
        var itemOffset           = itemHeight * countryListItemIndex;

        if(itemScrolled) {
            if ( (itemOffset + itemHeight) < scrollTop || (itemOffset + itemHeight) > (scrollTop + viewport) ) countryList.scrollTo({top: (itemOffset + itemHeight) - (viewport / 2)});
            
            // remove any highlighting from all items
            _unhighlightListItems(countryList);
        } else {
            countryList.scrollTo({top: (itemOffset + itemHeight) - (viewport / 2)});
        }
        
        countryListItem.classList.add('highlight');
    }

    // all Country List Dropdown Close 
    function _closeDropdown() {
        elements.forEach(function(element) {
            // Unhighlight Country List Items 
            _unhighlightListItems(element.previousElementSibling);
            
            element.previousElementSibling.classList.remove('active');

            var arrow = element.previousElementSibling.previousElementSibling.querySelector('.arrow');
            arrow.classList.remove('arrow-up');
        });
    }

    // Unhighlight List Items From Dropdown
    function _unhighlightListItems(countryList) {
        var highlightItems = countryList.querySelectorAll('li.country.highlight');
        if(highlightItems) {
            highlightItems.forEach(function(highlightItem) {
                highlightItem.classList.remove('highlight');
            });
        }
    }

    // find the country data for the given country code
    function _getCountryData(countryCode) {
        for (var i = 0; i < intlTelInput.countries.length; i++) {
            if (intlTelInput.countries[i].cca2.toUpperCase() == countryCode) {
                return [i, intlTelInput.countries[i]];
            }
        }
    }

    // replace any existing dial code with the new one
    function _updateNumber(inputVal, dialCode) {
        var dialCodeArray =  _getDialCode(inputVal);
        var prevDialCode = "+" + dialCodeArray.dialCode;
        var newDialCode  = "+" + dialCode;
        var newNumber;

        // if the previous number contained a valid dial code, replace it
        // (if more than just a plus character)
        if (prevDialCode.length > 1) {
            newNumber = inputVal.replace(prevDialCode, newDialCode);
            // if the old number was just the dial code,
            // then we will need to add the space again
            if (inputVal == prevDialCode) newNumber += " ";
        } else if (inputVal.length && inputVal.substr(0, 1) != "+") {
            // previous number didn't contain a dial code, so persist it
            newNumber = newDialCode + " " + inputVal.trim();
        } else {
            // previous number contained an invalid dial code, so wipe it
            newNumber = newDialCode + " ";
        }
        
        return newNumber;
    }

    // Re Append country <li> to the countryList <ul> container
    function _reAppendListItems(countryList, countryListItemIndex) {
        countryList.innerHTML = "";

        if( preferredCountries.length ) {
            _appendListItems(countryList, preferredCountries, 'preferred');

            var innerHtml = `<li class="divider"></li>`;
            countryList.insertAdjacentHTML('beforeend', innerHtml);
        }

        if( intlTelInput.countries.length ) _appendListItems(countryList, intlTelInput.countries, 'standard');

        var countryListItems = countryList.querySelectorAll('li.country');
        var countryListItem  = countryListItems[countryListItemIndex];

        countryListItem.classList.add('active');

        _countryListEventHandler(countryList);
    }

    // Country List Event Handler 
    function _countryListEventHandler(countryList) {
        var itemMouseEnter   = false;
        var countryListItems = countryList.querySelectorAll('li.country');
        var selectedFlag     = countryList.previousElementSibling.querySelector('.selected-flag');
        
        // Selected Flag Click Event
        selectedFlag.addEventListener('click',function(e) {
            e.stopPropagation();
            e.preventDefault();
            
            itemMouseEnter = false;

            countryList.classList.add('active');
            
            var arrow = selectedFlag.querySelector('.arrow');
            arrow.classList.toggle('arrow-up');

            var activeCountryListItem = countryList.querySelector('li.active');
            if(activeCountryListItem) {
                _scrollTo(activeCountryListItem, false);

                function preventDefault(e) {
                    e.stopPropagation();
                    e.preventDefault();
                }

                function preventDefaultForScrollKeys(e) {
                    e.stopPropagation();
                    e.preventDefault();
                    
                    // up: 38, down: 40,
                    var keys = {38: 1, 40: 1};
                    
                    if (keys[e.keyCode]) {
                        return false;
                    }
                }

                // modern Chrome requires { passive: false } when adding event
                var supportsPassive = false;
                try {
                    var opts = Object.defineProperty({}, 'passive', {
                        get: function() {supportsPassive = true;}
                    });
                    window.addEventListener('testPassive', null, opts);
                    window.removeEventListener('testPassive', null, opts);
                } catch (e) {}

                // call this to Disable
                function disableScroll(element) {
                    element.addEventListener('scroll', preventDefault, false); // older FF
                    element.addEventListener(wheelEvent, preventDefault, supportsPassive ? { passive: false } : false); // modern desktop
                    element.addEventListener('touchmove', preventDefault, supportsPassive ? { passive: false } : false); // mobile
                    element.addEventListener('keydown', preventDefaultForScrollKeys, false);
                }

                // call this to Enable
                function enableScroll(element) {
                    element.removeEventListener('scroll', preventDefault, false); // older FF
                    element.removeEventListener(wheelEvent, preventDefault, supportsPassive ? { passive: true } : false);  // modern desktop
                    element.removeEventListener('touchmove', preventDefault, supportsPassive ? { passive: true } : false); // mobile
                    element.removeEventListener('keydown', preventDefaultForScrollKeys, false);
                }

                var wheelEvent = "onwheel" in document.createElement("div") ? "wheel" : //     Modern browsers support "wheel"
                        document.onmousewheel !== undefined ? "mousewheel" : // Webkit and IE support at least "mousewheel"
                        "DOMMouseScroll";
                
                countryList.addEventListener(wheelEvent, function(e) {
                    if( Math.sign(e.deltaY) < 0 ) {
                        ( countryList.scrollTop <= 0 ) ? disableScroll(countryList) : enableScroll(countryList);
                    } else if( Math.sign(e.deltaY) > 0 ) {
                        ( (countryList.scrollHeight - countryList.offsetHeight) <= countryList.scrollTop ) ? disableScroll(countryList) : enableScroll(countryList);
                    }
                }, supportsPassive ? { passive: true } : false);
            } 
        });

        // Country List Items Click Event
        countryListItems.forEach(function(countryListItem, countryListItemIndex) {

            countryListItem.addEventListener('click', function(e) {
                e.stopPropagation();
                e.preventDefault();

                // Select List Item
                _selectListItem(countryListItem, countryListItemIndex);

                //  Close Dropdown
                _closeDropdown();
            });


            // Country List Items Mouse Enter Event
            countryListItem.addEventListener('mouseenter', function(e) {
                e.stopPropagation();
                e.preventDefault();

                if(!itemMouseEnter) return;
                itemMouseEnter = true;

                // when mouse enter a list item, remove any highlighting from all items
                _unhighlightListItems(countryListItem.parentElement);

                countryListItem.classList.add('highlight');
            });

            countryListItem.addEventListener('mousemove', function(e) {
                e.stopPropagation();
                e.preventDefault();
                
                if(itemMouseEnter) return;
                itemMouseEnter = true;

                // when mouse over a list item, remove any highlighting from all items
                _unhighlightListItems(countryListItem.parentElement);

            // update highlighting and scroll to active list item
                countryListItem.classList.add('highlight');
            });

        });
    }

    // add a country <li> to the countryList <ul> container
    function _appendListItems(countryList, countries, className) {
        var innerHtml = "";
        // for each country list
        countries.forEach(function(country) {
            
            innerHtml +=   `<li class="country ${className}">
                                <div class="flag-box">
                                    <div class="flag ${country.cca2}"></div>
                                </div>
                                <span class="country-name">${country['name']}</span>
                                <span class="dial-code">+${country['dialCode']}</span>
                            </li>`;

        });
        countryList.insertAdjacentHTML('beforeend', innerHtml);
    }

}

/**
international Telephone Number Validation
*/
function numberValidation(phone) {
    if(!phone) return {valid: false};

    var inputVal = (phone.charAt(0) != "+") ? "+" + phone : phone;
    var dialCodeArray =  _getDialCode(inputVal);
    var countryCode   = _getCountryCode(inputVal, dialCodeArray.prefixesDialCode);

    return isValidNumber(inputVal, dialCodeArray.dialCode, countryCode);
}

function isValidNumber(inputVal, dialCode, countryCode) {
    var valid = false;
    var splitPhoneNumber = _getSplitPhoneNumber(inputVal, dialCode);
    if ( intlTelInput.phoneNumberValidator[countryCode] == null || ( countryCode != "001" && dialCode != splitPhoneNumber.dialCode )) {
        valid = !1;
    } else {
        valid = -1 != dialCodePrefixesValidator(splitPhoneNumber.prefixes, intlTelInput.phoneNumberValidator[countryCode]);
    }
    return { valid: valid };
}

// try and extract a valid international dial code from a full telephone number
function _getDialCode(inputVal) {
    var PrefixesCountryDialCode = "";
    var countryDialCode = "";

    if (inputVal.charAt(0) == "+") {
        var prefixesDialCode = "";
        var dialCode = "";

        for (var i = 0; i < inputVal.length; i++) {
            if ( !isNaN(parseFloat(inputVal.charAt(i))) && ((prefixesDialCode += inputVal.charAt(i)), countryCodes[prefixesDialCode] && (PrefixesCountryDialCode = inputVal.substr(0, i + 1)), dialCode.length == 4) ) break;

            if ( !isNaN(parseFloat(inputVal.charAt(i))) && ((dialCode += inputVal.charAt(i)), countryCodes[dialCode] && (countryDialCode = inputVal.substr(0, i + 1)), dialCode.length == 4) ) break;
        }
    }

    return { dialCode: countryDialCode.replace(/\D/g, ""), prefixesDialCode: PrefixesCountryDialCode.replace(/\D/g, "") };
}

// try and extract a valid international country code from a full telephone number
function _getCountryCode(inputVal, prefixesDialCode) {
    var splitPhoneNumber = _getSplitPhoneNumber(inputVal, prefixesDialCode);
    var countryCodeArray = countryCodes[splitPhoneNumber.dialCode];
    var countryCode;
    
    if (countryCodeArray == null) {
        countryCode = null;
    } else if(countryCodeArray.length == 1) {
        countryCode = countryCodeArray[0];
    } else {
        for (var i = 0; i < countryCodeArray.length; i++) {
            if (intlTelInput.phoneNumberValidator[countryCodeArray[i]][23] != null) {
                if ( 0 == splitPhoneNumber.prefixes.search(intlTelInput.phoneNumberValidator[countryCodeArray[i]][23]) ) {
                    countryCode = countryCodeArray[i];
                    break;
                }
            } else if (-1 != dialCodePrefixesValidator(splitPhoneNumber.prefixes, intlTelInput.phoneNumberValidator[countryCodeArray[i]])) {
                countryCode = countryCodeArray[i];
                break;
            }
            countryCode = countryCodeArray[0];
        }
    }
    
    return countryCode;
}

function dialCodePrefixesValidator(prefixes, validator) {
    return PrefixesValidator(prefixes, validator[1])
        ? PrefixesValidator(prefixes, validator[5])
            ? 4
            : PrefixesValidator(prefixes, validator[4])
            ? 3
            : PrefixesValidator(prefixes, validator[6])
            ? 5
            : PrefixesValidator(prefixes, validator[8])
            ? 6
            : PrefixesValidator(prefixes, validator[7])
            ? 7
            : PrefixesValidator(prefixes, validator[21])
            ? 8
            : PrefixesValidator(prefixes, validator[25])
            ? 9
            : PrefixesValidator(prefixes, validator[28])
            ? 10
            : PrefixesValidator(prefixes, validator[2])
            ? validator[18] || PrefixesValidator(prefixes, validator[3])
            ? 2
            : 0
            : !validator[18] && PrefixesValidator(prefixes, validator[3])
            ? 1
            : -1
    : -1;
}

function PrefixesValidator(prefixes, validator) {
    return PrefixesValidatorMatch(prefixes, validator[3]) && PrefixesValidatorMatch(prefixes, validator[2]);
}

function PrefixesValidatorMatch(prefixes, validator) {
    var PrefixesArray = "string" == typeof validator ? prefixes.match("^(?:" + validator + ")$") : prefixes.match(validator);
    
    return PrefixesArray && PrefixesArray[0].length == prefixes.length ? !0 : !1;
}

function _getSplitPhoneNumber(inputVal, dialCode) {
    var phoneNumber = inputVal.replace(/\D/g, "");
    
    var splitPhoneNumber = {
        dialCode: phoneNumber.substr(0, dialCode.length), 
        prefixes: phoneNumber.substr(dialCode.length, phoneNumber.length),
        phoneNumber: inputVal,
    };

    return splitPhoneNumber;
}