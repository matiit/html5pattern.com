<?php

$aurel = '<a href="http://devone.de">Aurelian Hermand</a>';

/**
 * Pattern:
 *
 * Category => [Title, Description, Pattern, [PositiveTests], [NegativeTests], Source]
 */

$pattern = array(

    /**
     * Names
     */
    "Names" => array(
        // ICQ UIN:
        // Version 1: ^-*[1-9][0-9-]*$				-- Keine 0|- am Anfang. Kein - am Ende.
        // Version 2: ([1-9]\d*)+(?:-\d+)*			-- Keine Mehrfachbindestriche.
        // Version 3: (?:-?\d){5,}					-- Erlaubt 0 wieder am Anfang... dafür Minimum 5 Zahlen ohne -.
        // Version 4: ([1-9])+(?:-?\d){4,}			-- Keine 0|- am Anfang. Kein - am Ende.
        array('ICQ UIN', '', '([1-9])+(?:-?\d){4,}', array('111111111'), array('0', 'a'), $aurel.' & <a href="irc://irc.quakenet.org/#regex">Flobse</a>'),
        array('Alpha-Numeric', '', '[a-zA-Z0-9]+', array('a','1','a1'), array('!','%'), $aurel),
        array('Username with 2-20 chars', 'Format: string+string|number', '^[a-zA-Z][a-zA-Z0-9-_\.]{1,20}$', array(), array(), $aurel),
        array('Twitter Username', 'New Twitter usernames have a character maximum of 15', '^[A-Za-z0-9_]{1,15}$', array(), array(), '<a href="http://twitter.com/_kevinjones">Kevin Jones</a>'),
        array('Twitter Username', 'Backwards compatible Twitter username', '^[A-Za-z0-9_]{1,32}$', array(), array(), '<a href="http://twitter.com/_kevinjones">Kevin Jones</a>'),
        array('Facebook Username', '', '^[a-z\d\.]{5,}$', array(), array(), '<a href="http://twitter.com/_kevinjones">Kevin Jones</a>')
    ),
    

    /**
     * Passwords
     */
    "Passwords" => array(
        array('Password (UpperCase, LowerCase and Number)', '', '^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).*$', array(), array(), '<a href="http://imar.spaanjaars.com/297/regular-expression-for-a-strong-password">imar.spaanjaars.com</a>'),
        array('Password (UpperCase, LowerCase, Number/SpecialChar and min 8 Chars)', '', '(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$', array(), array(), '<a href="http://imar.spaanjaars.com/297/regular-expression-for-a-strong-password">imar.spaanjaars.com</a>')
    ),
    

    /**
     * Emails
     */
    "Emails" => array(
        //array('Mail', '', '(/^[^\\W][a-zA-Z0-9\\_\\-\\.]+([a-zA-Z0-9\\_\\-\\.]+)*\\@[a-zA-Z0-9_]+(\\.[a-zA-Z0-9_]+)*\\.[a-zA-Z]{2,4}$/)', array(), array(), 'Craighr')
    ),


    /**
     * Cards
     */
    "Cards" => array(
        array('Amex Credit Card', '', '[0-9]{4} *[0-9]{6} *[0-9]{5}', array(), array(), 'Bad'),
        array('Credit Card Number', '', '[0-9]{13,16}', array(), array(), $aurel),
        array('Diners Club Card', '', '^([30|36|38]{2})([0-9]{12})$', array(), array(), '<a href="http://regexlib.com/REDetails.aspx?regexp_id=951">regexlib.com</a>')
        
        // Marc Love
        // Credit Cards (Visa, MC, Discover, Amex, Diners, JCB, Switch & Solo):
        // /^(?:4\d{12}(\d{3})?|(5[1-5]\d{4}|677189)\d{10}|(6011|65\d{2}|64[4-9]\d)\d{12}|(62\d{14})|3[47]\d{13}|3(0[0-5]|[68]\d)\d{11}|35(28|29|[3-8]\d)\d{12}|6759\d{12}(\d{2,3})?|6767\d{12}(\d{2,3})?|5019\d{12})$/
        // https://github.com/Shopify/active_merchant/blob/master/lib/active_merchant/billing/credit_card_methods.rb
        
        // Markus Tiefenbacher http://twitter.com/tiefenb
        // Austrian Health Insurance Number (Short-Version): ^[0-9]{4}
        // Austrian Health Insurance Number (Long-Version): (^[0-9]{4})(\s{1})([0-9]{6}$)

    ),
    

    /**
     * Postal Codes
     */
    "Postal Codes" => array(
        array('American Postal Code', 'format is nnnnn or nnnnn-nnnn', '(\d{5}([\-]\d{4})?)', array(), array(), '<a href="http://www.useragentman.com/tests/html5Widgets/patternRequired.html">useragentman.com</a>'),
        array('Australian Postal Code', 'Format: nnnn', '[0-9]{4}', array(), array(), $aurel),
        array('Austrian Postal Code', 'Format: nnnn', '[0-9]{4}', array(), array(), '<a href="http://twitter.com/TIEFENB">Markus T.</a>'),
        array('Belgian Postal Code', 'Format: nnnn', '[0-9]{4}', array(), array(), 'Simon'),
        array('Brazilian Postal Code', 'Format: nnnnn-nnn', '[0-9]{5}[\-]?[0-9]{3}', array(), array(), '<a href="http://www.facebook.com/felipe.roberto.mogi">Felipe Roberto</a>'),
        array('Canadian Postal Code', 'Format: <a href="http://en.wikipedia.org/wiki/Postal_codes_in_Canada">A0A 0A0</a>', '[A-Za-z][0-9][A-Za-z] [0-9][A-Za-z][0-9]', array(), array(), '<a href="http://twitter.com/atomicnoggin">Patrick Denny</a> & '.$aurel),
        array('Danish & Faroe Island Postal Code', 'Format: nnn or nnnn', '[0-9]{3,4}', array(), array(), '<a href="http://www.v4d5.net/">Morten Vadskær</a>'),
        array('Dutch Postal Code', 'Format: 1234 aa', '[1-9][0-9]{3}\s?[a-zA-Z]{2}', array(), array(), '<a href="http://regexlib.com">Jos Krause</a> & <a href="http://wnas.nl/">wnas</a>'),
        array('German Postal Code', 'Format: nnnnn', '[0-9]{5}', array(), array(), $aurel),
        array('Hungarian Postal Code', 'Format: nnnn', '[0-9]{4}', array(), array(), 'Ákos Nikházy'),
        array('Italian Postal Code', 'Format: nnnnn', '[0-9]{5}', array(), array(), '<a href="http://simonewebdesign.it/">Simone</a>'),
        array('Japanese Postal Code', 'Format: nnn-nnnn', '\d{3}-\d{4}', array(), array(), '<a href="http://people.opera.com/danield">Daniel Davis</a>'),
        array('Luxembourg Postal Code', 'Format: L-nnnn incl. typical variations', '(L\s*(-|—|–))\s*?[\d]{4}', array(), array(), '<a href="http://twitter.com/d_raber">Dieter Raber</a>'),
        array('Polish Postal Code' ,'Format: nn-nnn', '[0-9]{2}\-[0-9]{3}', array(), array(), '<a href="http://hyski.pl/">Adam Hyski</a>'),
        array('Spanish Postal Code', 'Format: 01xxx to 50xxx', '((0[1-9]|5[0-2])|[1-4][0-9])[0-9]{3}', array(), array(), '<a href="http://twitter.com/martinpulido">Santi Martin</a>'),
        //array('Swedish Postal Code', 'Format: nnnnn or nnn nn', '[0-9]{3}\s?[0-9]{2}', array(), array(), '<a href="http://www.joakimgreen.com/">Joakim</a> & <a href="http://twitter.com/jflote">johan flote rosén</a>'),
        array('Swedish Postal Code', '', '\d{3}\s?\d{2}', array(), array(), '<a href="http://about.me/romainguerin">Romain Guerin</a>'),
        //array('UK Postal Code', '', '[A-Z]{1,2}[0-9R][0-9A-Z]? [0-9][ABD-HJLNP-UW-Z]{2}', array(), array(), 'riklomas')
        array('UK Postal Code', '', '[A-Za-z]{1,2}[0-9Rr][0-9A-Za-z]? [0-9][ABD-HJLNP-UW-Zabd-hjlnp-uw-z]{2}', array(), array(), 'riklomas & Craig Barnes')
	),
    

    /**
     * Phones
     */
    "Phones" => array(
        array('Phone Number (Format: +99(99)9999-9999)', '', '[\+]\d{2}[\(]\d{2}[\)]\d{4}[\-]\d{4}', array(), array(), '<a href="http://indolencia.blogspot.com/">José Lucas</a>'),
        array('UK Phone Number', '', '^\s*\(?(020[7,8]{1}\)?[ ]?[1-9]{1}[0-9{2}[ ]?[0-9]{4})|(0[1-8]{1}[0-9]{3}\)?[ ]?[1-9]{1}[0-9]{2}[ ]?[0-9]{3})\s*$', array(), array(), ''),
        array('French Phone Number', 'A french phone number must begin with one of the following:<br />- a zero<br />- +33 (surronding with optional parathensis), all following by optional space<br />- 0033 following by optional space<br /><br />Then a number betwen 1 and 7, or 9.<br /><br />Then four groups of 2 digits, optionaly seperated by one of the following: point (.), dash (-), space (\s)', '^(?:0|\(?\+33\)?\s?|0033\s?)[1-79](?:[\.\-\s]?\d\d){4}$', array("0123456789","0623456789","0723456789","0923456789","01.23.45.67.89","01 23 45 67 89","01-23-45-67-89","0033123456789","0033 123456789","+33123456789","+33923456789","(+33)1.23 45-6789","(+33) 123456789"), array("0823456789","0123456789 ","1234567890","0034123456789"), '<a href="http://about.me/romainguerin">Romain Guerin</a>'),
        array('USA Phone Number', 'US based Phone Number in the format of: 123-456-7890', '\d{3}[\-]\d{3}[\-]\d{4}', array(), array(), 'Camville')
        
        // Jacob9706
        // US Phone Validator with few false positives. A lot of diffrent formmats | 2222222222, 222 222 2222, 222-222-2222, 222.222.2222 (222) 222-2222 but not (222 222-2222 or 222) 222-2222
        // ^(\(\d{3}\) ?\d{3} ?- ?|(\d{3} ?[-.]? ?){2})\d{4}$
        
        // CreativeNovice
        // US phone number notation, matches:
        // ^[\+]?[\d]{0,3}[\-|\s]?[\(]?[\d]{3}[\)|\-]?[\s|\d]?[\d]{2,3}[\-]?[\d]{3,4}$ 
        // 555-555-555 555 555-555 5555555555 15555555555 +15555555555 1-555-555-5555 +1-555-555-5555 +12 555-555-5555 +1 (555) 555-5555 (555) 555-5555
        
        // Mashville
        // Kenyan Phone Number
        // ^[0-0]{1}[7-7]{1}[0-9]{8}$  This validates a number in this format 07######### e.g. 0712345678

        // Ondřej Baše
        // Czech Phone Number
        // ((\+|00)420)? ?\d{3} ?\d{3} ?\d{3}
        // +420 or 00420 is the international prefix of Czech Republic phone numbers and is optional. Spaces after the prefix and spaces between each of the 3digits number are optional too. Phone number itself (without the international prefix) consists of 9 digits.

        // Matheus Matos http://www.matheusmatos.com/
        // Phone number of Brazil. Format: (xx) 0000-0000 or (xx) 0000.0000 or (xx)0000-0000 or (xx)0000.0000 . Numbers of DDD 11 (São Paulo), for numbers DDD 11 (São Paulo), add 9 in front of the number. Example: (11)90000-0000 and the remainder of the formats. Pattern:
        // [\(](11[\)](|[\s])9|[2-9][0-9][\)](|[\s])|1[2-9][\)](|[\s]))[0-9]{4}([\.]|[\-])[0-9]{4}

        // Shane Thompson http://www.facebook.com/profile.php?id=612046599
        // (((\+\d{2}\s?)?\(\d{2}\)\s?)?\d{4}\s?\d{4})?
        //Phone number.<br>Examples<br>Valid: +99(99)99999999 +99 (99) 9999 9999<br>^ With and without whitespace<br>Invalid:+99  99 9999 9999^ No brackets around second group of numbers, two spaces after +99<br>99 abcd efgh<br>^ Letters not permitted<br><br>99 9999 99<br>99 9999^ Last group must be 4 digits
        
        // Basic phone number verification: 
        //(^(\+?\-? *[0-9]+)([,0-9 ]*)([0-9 ])*$)
        //it allows a +, - , signs digits, spaces, but not a blank entry. If you need a blank entry, use this:
        //(^(\+?\-? *[0-9]+)([,0-9 ]*)([0-9 ])*$)|(^ *$)
        //based on regex by: Vitaly Kompot at regexlib.com

        // jonhorner
        // UK phone number
        // (\(?\+\d{2}\)?\s?)?([0-9\(\)]{3,8})(\s)?([0-9\s]{5,10})
        // This allows for an optional country code with or without brackets, area code with or without brackets and the local number allowing for using spaces to break up the number.
        
    ),
    
    
    /**
     * Dates
     */
    "Dates" => array(
        array('Basic date', 'Format: DD.MM.YYYY', '(0[1-9]|1[0-9]|2[0-9]|3[01]).(0[1-9]|1[012]).[0-9]{4}', array(), array(), 'Unbekannt'),
        array('Basic date', 'Format: YYYY-MM-DD', '[0-9]{4}-(0[1-9]|1[012])-(0[1-9]|1[0-9]|2[0-9]|3[01])', array(), array(), $aurel),
        array('Full Date Validation (YYYY-MM-DD)', 'Checks that<br />1) the year is numeric and starts with 19 or 20,<br />2) the month is numeric and between 01-12, and<br />3) the day is numeric between 01-29, or<br />    b) 30 if the month value is anything other than 02, or<br />    c) 31 if the month value is one of 01,03,05,07,08,10, or 12.', '(?:19|20)[0-9]{2}-(?:(?:0[1-9]|1[0-2])-(?:0[1-9]|1[0-9]|2[0-9])|(?:(?!02)(?:0[1-9]|1[0-2])-(?:30))|(?:(?:0[13578]|1[02])-31))', array(), array(), '<a href="http://twitter.com/atomicnoggin">Patrick Denny</a>'),
        array('Date (Format: MM/DD/YYYY)', '', '(0[1-9]|1[012])[- /.](0[1-9]|[12][0-9]|3[01])[- /.](19|20)\d\d', array(), array(), '<a href="http://ericleads.com/h5validate/">ericleads.com</a>'),
        array('Full date validation (MM/DD/YYYY)', '', '(?:(?:0[1-9]|1[0-2])[\/\\\-. ]?(?:0[1-9]|[12][0-9])|(?:(?:0[13-9]|1[0-2])[\/\\\-. ]?30)|(?:(?:0[13578]|1[02])[\/\\\-. ]?31))[\/\\\-. ]?(?:19|20)[0-9]{2}', array(), array(), '<a href="http://twitter.com/atomicnoggin">Patrick Denny</a>'),
        array('Date with leapyear-check', '', '(?:19|20)(?:(?:[13579][26]|[02468][048])-(?:(?:0[1-9]|1[0-2])-(?:0[1-9]|1[0-9]|2[0-9])|(?:(?!02)(?:0[1-9]|1[0-2])-(?:30))|(?:(?:0[13578]|1[02])-31))|(?:[0-9]{2}-(?:0[1-9]|1[0-2])-(?:0[1-9]|1[0-9]|2[0-8])|(?:(?!02)(?:0[1-9]|1[0-2])-(?:29|30))|(?:(?:0[13578]|1[02])-31)))', array(), array(), 'dambrisco'),
        array('Time', 'Format: HH:MM:SS', '(0[0-9]|1[0-9]|2[0-3])(:[0-5][0-9]){2}', array(), array(), $aurel), // does 0[0-9]|1[0-9] couldn't be shortened as [01][0-9]?
        array('type="datetime"', 'Date according to W3C for input type="datetime". Matches the following:<br />1990-12-31T23:59:60Z<br />1996-12-19T16:39:57-08:00<br /><br /><a href="http://www.w3.org/TR/html-markup/input.datetime.html#input.datetime.attrs.value">http://www.w3.org/TR/html-markup/input.datetime.html#input.datetime.attrs.value</a>', '/([0-2][0-9]{3})\-([0-1][0-9])\-([0-3][0-9])T([0-5][0-9])\:([0-5][0-9])\:([0-5][0-9])(Z|([\-\+]([0-1][0-9])\:00))/', array(), array(), '<a href="http://twitter.com/Tatsh">Tatsh</a>')
        
        // medkarim
        // full date validation format dd/mm/yyyy with taking into account leap year
        // ((((0[1-9]|[12][0-9]|3[01])\/(0[13578]|1[02]))|((0[1-9]|[12][0-9]|30)\/(0[469]|11))|((0[1-9]|[12][0-8])\/(02)))\/[0-9]{4})|(29\/02\/((([02468][048]|[13579][26])00)|([0-9]{2}([02468][48]|[13579][26]))))
        
        // Igal Bitan http://www.facebook.com/Chat7noir
        // Date format for France and England (dd/MM/yyyy) - Simple but permissive pattern
        // (([012]?\d)|(3[01]))/((0?\d)|(1[012]))/\d{4}
        // Date format for Deutschland (dd.MM.yyyy) - Simple but permissive pattern
        // (([012]?\d)|(3[01]))\.((0?\d)|(1[012]))\.\d{4}
        // Date format for France and England (dd/MM/yyyy) - Complex but nearly exhaustive
        // ^(((0[1-9]|[12]\d|3[01])/(0[13578]|1[02])/((19|[2-9]\d)\d{2}))|((0[1-9]|[12]\d|30)/(0[13456789]|1[012])/((19|[2-9]\d)\d{2}))|((0[1-9]|1\d|2[0-8])/02/((19|[2-9]\d)\d{2}))|(29/02/((1[6-9]|[2-9]\d)(0[48]|[2468][048]|[13579][26])|((16|[2468][048]|[3579][26])00))))$
        // Date format for Deutschland (dd.MM.yyyy) - Complex but nearly exhaustive
        // ^(((0[1-9]|[12]\d|3[01])\.(0[13578]|1[02])\.((19|[2-9]\d)\d{2}))|((0[1-9]|[12]\d|30)\.(0[13456789]|1[012])\.((19|[2-9]\d)\d{2}))|((0[1-9]|1\d|2[0-8])\.02\.((19|[2-9]\d)\d{2}))|(29\.02\.((1[6-9]|[2-9]\d)(0[48]|[2468][048]|[13579][26])|((16|[2468][048]|[3579][26])00))))$

        
    ),
    
    
    /**
     * Colors
     */
    "Colors" => array(
        array('Hex-Color', 'Format is #CCC or #CCCCCC', '^#?([a-fA-F0-9]{6}|[a-fA-F0-9]{3})$', array('#ccc', '#cccccc', '#CCC'), array('#HHH'), '<a href="http://corbacho.info">David Corbacho</a>')
    ),


    /**
     * Miscs
     */
    "Miscs" => array(
        // IP:
        // Version 1: [0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}			-- Einfacher Test
        // Version 2: \d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}						-- Kürzer
        // Vorschlag: ^([1-9]|[1-9][0-9]|1[0-9][0-9]|2[0-4][0-9]|25[0-5])(\.([0-9]|[1-9][0-9]|1[0-9][0-9]|2[0-4][0-9]|25[0-5])){3}$
        //array('IPv4 Address', '', '\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}', array(), array(), 'dipser'),
        array('IPv4 Address', '', '((^|\.)((25[0-5])|(2[0-4]\d)|(1\d\d)|([1-9]?\d))){4}$', array(), array(), 'Rasmus Fløe'),
        //array('IPv6 Address', '', ' \d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}', array(), array(), 'Ambidex'),
        array('IPv6 Address', '', '((^|:)([0-9a-fA-F]{0,4})){1,8}$', array(), array(), 'Rasmus Fløe & dipser'),
        array('Domains like "abc.de"', '', '^([a-zA-Z0-9]([a-zA-Z0-9\-]{0,61}[a-zA-Z0-9])?\.)+[a-zA-Z]{2,6}$', array(), array(), 'Unknown'),
        //array('Numbers with or without decimals', 'Format: 9 or 9.9', '\-?\d+(\.\d{0,})?', array(), array(), '<a href="http://www.lightingbyothers.com/">Kenny</a>'),
        array('Numbers with or without decimals', 'Format: 9 or 9.9 or 9,9', '[-+]?[0-9]*[.,]?[0-9]+', array(), array(), 'Frédéric Hewitt'),
        array('UUID', '', '^[0-9A-Fa-f]{8}\-[0-9A-Fa-f]{4}\-[0-9A-Fa-f]{4}\-[0-9A-Fa-f]{4}\-[0-9A-Fa-f]{12}$', array(), array(), 'blainsmith'),
        array('Latitude or Longitude', '', '-?\d{1,3}\.\d+', array(), array(), '<a href="http://www.the-art-of-web.com/html/html5-form-validation/">the-art-of-web.com</a>'),
        array('Price (Format: 1.00)', '', '\d+(\.\d{2})?', array(), array(), '<a href="http://www.the-art-of-web.com/html/html5-form-validation/">the-art-of-web.com</a>'),
        array('Price (Format: 1,00)', '', '\d+(,\d{2})?', array(), array(), '<a href="http://www.the-art-of-web.com/html/html5-form-validation/">the-art-of-web.com</a>'),
        array('ISBN', 'Combining of the following:<br />* Simple one without dashes, ISBN 13: 97[89][0-9]{10}<br />* Simple one w/o dashes, ISBN 10: [0-9]{9}[0-9Xx]<br /><br />* Complex one with dashes, ISBN 13: (?=.{17}$)97[89]-(?:[0-9]+-){2}[0-9]+-[0-9]<br />* Complex one with dashes, ISBN 10: (?=.{13}$)(?:[0-9]+-){2}[0-9]+-[0-9Xx]', '(?:(?=.{17}$)97[89][ -](?:[0-9]+[ -]){2}[0-9]+[ -][0-9]|97[89][0-9]{10}|(?=.{13}$)(?:[0-9]+[ -]){2}[0-9]+[ -][0-9Xx]|[0-9]{9}[0-9Xx])', array(), array(), '<a href="http://regexlib.com">Michael Ash</a> & <a href="http://www.manuel-strehl.de">Boldewyn</a>'),
        array('Md5 Hash', '', '[0-9a-fA-F]{32}', array(), array(), '<a href="http://twitter.com/Yzahkin">Ákos</a>')
        
        // Carter Cole
        // URL: (http|ftp|https):\/\/[\w\-_]+(\.[\w\-_]+)+([\w\-\.,@?^=%&:/~\+#]*[\w\-\@?^=%&/~\+#])?
    )



);

