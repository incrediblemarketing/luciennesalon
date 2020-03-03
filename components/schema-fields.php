<?php
if (have_rows('schema_info', 'options')) :
    while (have_rows('schema_info', 'options')) : the_row();
        $business_type = get_sub_field('business_type');
        $business_legal_name = get_sub_field('business_legal_name');
        $business_name = get_sub_field('business_name');
        $business_alternate_name = get_sub_field('business_alternate_name');
        $business_phone = get_sub_field('business_phone');
        $business_url = get_sub_field('business_url');
        $business_price_range = get_sub_field('business_price_range');
        $business_same_as = '';
        $i = 0;
        while (have_rows('business_same_as')) : the_row();
            if ($i > 0) {
                $comma = ', ';
            } else {
                $comma = '';
            }
            $business_same_as .=  $comma . '"' . get_sub_field('business_same_as_url') . '"';
            $i++;
        endwhile;
        $i = 0;
        $business_makes_offer = '';
        while (have_rows('business_makes_offer')) : the_row();
            if ($i > 0) {
                $comma = ', ';
            } else {
                $comma = '';
            }
            $business_makes_offer .= $comma . '"' . get_sub_field('makes_offer') . '"';
            $i++;
        endwhile;

        $business_hours = '';
        while (have_rows('business_hours')) : the_row();
            //"Mo-Fri 10:00-19:00", "Sa 10:00-22:00", "Su 10:00-21:00"
            $sunday = $monday = $tuesday = $wednesday = $thursday = $friday = $saturday = '';

            if (get_sub_field('sun_closed')) :
                $sun_am = DateTime::createFromFormat('H:i A', '00:00 AM');
                $sun_pm = DateTime::createFromFormat('H:i A', '00:00 AM');
            else :
                $sun_am = DateTime::createFromFormat('H:i A', get_sub_field('sunday_am') . ' AM');
                $sun_pm = DateTime::createFromFormat('H:i A', get_sub_field('sunday_pm') . ' PM');
            endif;
            if ((get_sub_field('sunday_am') && get_sub_field('sunday_pm')) || get_sub_field('sun_closed')) :
                $sunday = '{"@type": "OpeningHoursSpecification","dayOfWeek": "Sunday","opens": "' . $sun_am->format('H:i:s') . '","closes": "' . $sun_pm->format('H:i:s') . '"}';
            endif;

            if (get_sub_field('mon_closed')) :
                $mon_am = DateTime::createFromFormat('H:i A', '00:00 AM');
                $mon_pm = DateTime::createFromFormat('H:i A', '00:00 AM');
            else :
                $mon_am = DateTime::createFromFormat('H:i A', get_sub_field('monday_am') . ' AM');
                $mon_pm = DateTime::createFromFormat('H:i A', get_sub_field('monday_pm') . ' PM');
            endif;
            if ((get_sub_field('monday_am') && get_sub_field('monday_pm')) || get_sub_field('mon_closed')) :
                $monday = '{"@type": "OpeningHoursSpecification","dayOfWeek": "Monday","opens": "' . $mon_am->format('H:i:s') . '","closes": "' . $mon_pm->format('H:i:s') . '"}';
            endif;


            if (get_sub_field('tu_closed')) :
                $tu_am = DateTime::createFromFormat('H:i A', '00:00 AM');
                $tu_pm = DateTime::createFromFormat('H:i A', '00:00 AM');
            else :
                $tu_am = DateTime::createFromFormat('H:i A', get_sub_field('tuesday_am') . ' AM');
                $tu_pm = DateTime::createFromFormat('H:i A', get_sub_field('tuesday_pm') . ' PM');
            endif;
            if ((get_sub_field('tuesday_am') && get_sub_field('tuesday_pm')) || get_sub_field('tu_closed')) :
                $tuesday = '{"@type": "OpeningHoursSpecification","dayOfWeek": "Tuesday","opens": "' . $tu_am->format('H:i:s') . '","closes": "' . $tu_pm->format('H:i:s') . '"}';
            endif;


            if (get_sub_field('wed_closed')) :
                $wed_am = DateTime::createFromFormat('H:i A', '00:00 AM');
                $wed_pm = DateTime::createFromFormat('H:i A', '00:00 AM');
            else :
                $wed_am = DateTime::createFromFormat('H:i A', get_sub_field('wednesday_am') . ' AM');
                $wed_pm = DateTime::createFromFormat('H:i A', get_sub_field('wednesday_pm') . ' PM');
            endif;
            if ((get_sub_field('wednesday_am') && get_sub_field('wednesday_pm')) || get_sub_field('wed_closed')) :
                $wednesday = '{"@type": "OpeningHoursSpecification","dayOfWeek": "Wednesday","opens": "' . $wed_am->format('H:i:s') . '","closes": "' . $wed_pm->format('H:i:s') . '"}';
            endif;



            if (get_sub_field('thu_closed')) :
                $thur_am = DateTime::createFromFormat('H:i A', '00:00 AM');
                $thur_pm = DateTime::createFromFormat('H:i A', '00:00 AM');
            else :
                $thur_am = DateTime::createFromFormat('H:i A', get_sub_field('thursday_am') . ' AM');
                $thur_pm = DateTime::createFromFormat('H:i A', get_sub_field('thursday_pm') . ' PM');
            endif;
            if ((get_sub_field('thursday_am') && get_sub_field('thursday_pm')) || get_sub_field('thu_closed')) :
                $thursday = '{"@type": "OpeningHoursSpecification","dayOfWeek": "Thursday","opens": "' . $thur_am->format('H:i:s') . '","closes": "' . $thur_pm->format('H:i:s') . '"}';
            endif;


            if (get_sub_field('fri_closed')) :
                $fri_am = DateTime::createFromFormat('H:i A', '00:00 AM');
                $fri_pm = DateTime::createFromFormat('H:i A', '00:00 AM');
            else :
                $fri_am = DateTime::createFromFormat('H:i A', get_sub_field('friday_am') . ' AM');
                $fri_pm = DateTime::createFromFormat('H:i A', get_sub_field('friday_pm') . ' PM');
            endif;
            if ((get_sub_field('friday_am') && get_sub_field('friday_pm')) || get_sub_field('fri_closed')) :
                $friday = '{"@type": "OpeningHoursSpecification","dayOfWeek": "Friday","opens": "' . $fri_am->format('H:i:s') . '","closes": "' . $fri_pm->format('H:i:s') . '"}';
            endif;


            if (get_sub_field('sat_closed')) :
                $sat_am = DateTime::createFromFormat('H:i A', '00:00 AM');
                $sat_pm = DateTime::createFromFormat('H:i A', '00:00 AM');
            else :
                $sat_am = DateTime::createFromFormat('H:i A', get_sub_field('saturday_am') . ' AM');
                $sat_pm = DateTime::createFromFormat('H:i A', get_sub_field('saturday_pm') . ' PM');
            endif;
            if ((get_sub_field('saturday_am') && get_sub_field('saturday_pm')) || get_sub_field('sat_closed')) :
                $saturday = '{"@type": "OpeningHoursSpecification","dayOfWeek": "Saturday","opens": "' . $sat_am->format('H:i:s') . '","closes": "' . $sat_pm->format('H:i:s') . '"}';
            endif;

            $time = '';
            if ($sunday) : $time .= $sunday;
            endif;
            if ($monday) : $time .= ',' . $monday;
            endif;
            if ($tuesday) : $time .= ',' . $tuesday;
            endif;
            if ($wednesday) : $time .= ',' . $wednesday;
            endif;
            if ($thursday) : $time .= ',' . $thursday;
            endif;
            if ($friday) : $time .= ',' . $friday;
            endif;
            if ($saturday) : $time .= ',' . $saturday;
            endif;

        endwhile;
        $business_logo = get_sub_field('business_logo');
        $business_image = get_sub_field('business_image');
        $business_founder_name = get_sub_field('business_founder_name');
        $business_founder_prefix = get_sub_field('business_founder_prefix');
        $business_founder_given_name = get_sub_field('business_founder_given_name');
        $business_founder_family_name = get_sub_field('business_founder_family_name');
        $business_founder_job_title = get_sub_field('business_founder_job_title');
        $business_founder_image = get_sub_field('business_founder_image');
        $business_founder_works_for = get_sub_field('business_founder_works_for');
        $business_founder_affiliation = get_sub_field('business_founder_affiliation');
        $business_founder_member_of = get_sub_field('business_founder_member_of');
        $founder_same_as = '';
        $i = 0;
        while (have_rows('business_founder_same_as')) : the_row();
            if ($i > 0) {
                $comma = ', ';
            } else {
                $comma = '';
            }
            $founder_same_as .=  $comma . '"' . get_sub_field('founder_same_as') . '"';
            $i++;
        endwhile;
        $address_info = get_sub_field('address_info');
        $address_locality = get_sub_field('address_locality');
        $street_address = get_sub_field('street_address');
        $address_region = get_sub_field('address_region');
        $postal_code = get_sub_field('postal_code');
        $lat = $address_info['lat']; // lat
        $lng = $address_info['lng']; // lng
        $contact_type = get_sub_field('contact_type');
        $contact_phone = get_sub_field('contact_phone');
        $contact_url = get_sub_field('contact_url');
    endwhile;
endif; ?>

<script type="application/ld+json">
    {
        <?php
        echo '"@context": "http://schema.org",';
        if ($business_type) : echo '"@type": "' . $business_type . '",';
        endif;
        if ($business_logo) : echo '"logo": "' . $business_logo['url'] . '",';
        endif;
        if ($business_url) : echo '"url": "' . $business_url . '",';
        endif;
        if ($business_price_range) : echo '"priceRange": "' . $business_price_range . '",';
        endif;
        if ($business_image) : echo '"image": "' . $business_image['url'] . '",';
        endif;
        if ($business_same_as) : echo '"sameAs": [' . $business_same_as . '],';
        endif;
        if ($business_legal_name) : echo '"legalName": "' . $business_legal_name . '",';
        endif;
        if ($business_name) : echo '"name": "' . $business_name . '",';
        endif;
        if ($business_alternate_name) : echo '"alternateName": "' . $business_alternate_name . '",';
        endif;
        if ($business_phone) : echo '"telephone": "' . $business_phone . '",';
        endif;
        if ($business_makes_offer) : echo '"makesOffer": [' . $business_makes_offer . '],';
        endif;
        if ($time) : echo '"openingHoursSpecification": [' . $time . '],';
        endif;
        if ($business_founder_name) :
            echo '"founder":{';
            echo '"@type": "Person",';
            if ($business_founder_name) : echo '"name": "' . $business_founder_name . '",';
            endif;
            if ($business_founder_prefix) : echo '"honorificPrefix": "' . $business_founder_prefix . '",';
            endif;
            if ($business_founder_given_name) : echo '"givenName": "' . $business_founder_given_name . '",';
            endif;
            if ($business_founder_family_name) : echo '"familyName": "' . $business_founder_family_name . '",';
            endif;
            if ($business_founder_job_title) : echo '"jobTitle": "' . $business_founder_job_title . '",';
            endif;
            if ($business_founder_image) : echo '"image": "' . $business_founder_image['url'] . '",';
            endif;
            if ($business_founder_works_for) : echo '"worksFor": "' . $business_founder_works_for . '",';
            endif;
            if ($business_founder_affiliation) : echo '"affiliation": "' . $business_founder_affiliation . '",';
            endif;
            if ($business_founder_member_of) : echo '"memberOf": "' . $business_founder_member_of . '",';
            endif;
            if ($founder_same_as) : echo '"sameAs": [' . $founder_same_as . ']';
            endif;
            echo '},';
        endif;
        if ($address_info) :
            echo '"address":{';
            echo '"@type": "PostalAddress",';
            if ($address_locality) : echo '"addressLocality": "' . $address_locality . '",';
            endif;
            if ($address_region) : echo '"addressRegion": "' . $address_region . '",';
            endif;
            if ($street_address) : echo '"streetAddress": "' . $street_address . '",';
            endif;
            if ($postal_code) : echo '"postalCode": "' . $postal_code . '"';
            endif;
            echo '},';
        endif;
        if ($lat || $lng) :
            echo '"geo":{';
            echo '"@type": "GeoCoordinates",';
            if ($lat) : echo '"latitude": "' . $lat . '",';
            endif;
            if ($lng) : echo '"longitude": "' . $lng . '"';
            endif;
            echo '},';
        endif;
        if ($contact_type) :
            echo '"contactPoint":{';
            echo '"@type": "contactPoint",';
            if ($contact_type) : echo '"contactType": "' . $contact_type . '",';
            endif;
            if ($contact_phone) : echo '"telephone": "' . $contact_phone . '",';
            endif;
            if ($contact_url) : echo '"url": "' . $contact_url . '"';
            endif;
            echo '}';
        endif ?>
    }
</script>