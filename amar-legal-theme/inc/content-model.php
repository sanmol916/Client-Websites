<?php
/**
 * Amar Legal — Editable content field model.
 *
 * Single source of truth for every editable string/image and its default.
 * Sections map to a Customizer section under the "Page Content" panel.
 *
 * Field def: array( 'label' => ..., 'type' => 'text'|'textarea'|'image', 'default' => ... )
 * For image fields, 'default' is the bundled placeholder filename.
 *
 * @package Amar_Legal
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * @return array
 */
function amar_legal_fields() {
	return array_merge(
		amar_legal_fields_home(),
		amar_legal_fields_about(),
		amar_legal_fields_practice(),
		amar_legal_fields_team(),
		amar_legal_fields_contact()
	);
}

/**
 * HOME page fields.
 */
function amar_legal_fields_home() {
	return array(
		'al_home_hero' => array(
			'title'  => __( 'Home · Hero', 'amar-legal' ),
			'fields' => array(
				'home_hero_eyebrow'   => array( 'label' => 'Eyebrow (small label)', 'type' => 'text', 'default' => 'Trusted Legal Counsel' ),
				'home_hero_title'     => array( 'label' => 'Heading', 'type' => 'text', 'default' => 'Justice, Guided by Integrity and Experience' ),
				'home_hero_highlight' => array( 'label' => 'Highlighted word (shown in gold)', 'type' => 'text', 'default' => 'Integrity' ),
				'home_hero_text'      => array( 'label' => 'Intro paragraph', 'type' => 'textarea', 'default' => 'Amar Legal stands beside individuals, families and businesses — offering clear, principled advice and steadfast representation across every stage of your legal journey.' ),
				'home_hero_btn1'      => array( 'label' => 'Primary button text', 'type' => 'text', 'default' => 'Request a Consultation' ),
				'home_hero_btn2'      => array( 'label' => 'Secondary button text', 'type' => 'text', 'default' => 'Explore Practice Areas' ),
				'home_stat1_num'      => array( 'label' => 'Stat 1 — number', 'type' => 'text', 'default' => '25+' ),
				'home_stat1_label'    => array( 'label' => 'Stat 1 — label', 'type' => 'text', 'default' => 'Years of Combined Experience' ),
				'home_stat2_num'      => array( 'label' => 'Stat 2 — number', 'type' => 'text', 'default' => '1500+' ),
				'home_stat2_label'    => array( 'label' => 'Stat 2 — label', 'type' => 'text', 'default' => 'Matters Handled' ),
				'home_stat3_num'      => array( 'label' => 'Stat 3 — number', 'type' => 'text', 'default' => '6' ),
				'home_stat3_label'    => array( 'label' => 'Stat 3 — label', 'type' => 'text', 'default' => 'Core Practice Areas' ),
				'home_hero_image'     => array( 'label' => 'Background image', 'type' => 'image', 'default' => 'hero-home.jpg' ),
			),
		),
		'al_home_intro' => array(
			'title'  => __( 'Home · Who We Are', 'amar-legal' ),
			'fields' => array(
				'home_intro_eyebrow' => array( 'label' => 'Eyebrow', 'type' => 'text', 'default' => 'Who We Are' ),
				'home_intro_title'   => array( 'label' => 'Heading', 'type' => 'text', 'default' => 'A Firm Built on Principle and Purpose' ),
				'home_intro_p1'      => array( 'label' => 'Paragraph 1', 'type' => 'textarea', 'default' => 'Law has evolved with the evolution of civilization. Civil society has found it useful to give prominence to law in order to inculcate discipline in the lives of its members — so that each contributes to the development of a society where every person can lead a life of dignity, in an environment of peace and harmony.' ),
				'home_intro_p2'      => array( 'label' => 'Paragraph 2', 'type' => 'textarea', 'default' => 'Today, law operates within an institutionalised framework, continuously striving toward a society where all can progress without disturbing the rights and privileges of others. At Amar Legal, we carry that spirit into every matter we accept.' ),
				'home_intro_tick1'   => array( 'label' => 'Checklist item 1', 'type' => 'text', 'default' => 'Transparent advice and honest assessments' ),
				'home_intro_tick2'   => array( 'label' => 'Checklist item 2', 'type' => 'text', 'default' => 'Client interests placed first, always' ),
				'home_intro_tick3'   => array( 'label' => 'Checklist item 3', 'type' => 'text', 'default' => 'Diligent representation before courts & tribunals' ),
				'home_intro_btn'     => array( 'label' => 'Button text', 'type' => 'text', 'default' => 'More About Us' ),
				'home_intro_badge_num' => array( 'label' => 'Badge — top text', 'type' => 'text', 'default' => 'Est.' ),
				'home_intro_badge_txt' => array( 'label' => 'Badge — caption', 'type' => 'text', 'default' => 'A legacy of dependable counsel' ),
				'home_intro_image'   => array( 'label' => 'Image', 'type' => 'image', 'default' => 'about-firm.jpg' ),
			),
		),
		'al_home_practice' => array(
			'title'  => __( 'Home · Practice Areas', 'amar-legal' ),
			'fields' => array(
				'home_pa_eyebrow'  => array( 'label' => 'Eyebrow', 'type' => 'text', 'default' => 'What We Do' ),
				'home_pa_title'    => array( 'label' => 'Heading', 'type' => 'text', 'default' => 'Comprehensive Legal Expertise' ),
				'home_pa_subtitle' => array( 'label' => 'Subtitle', 'type' => 'textarea', 'default' => 'From everyday concerns to complex disputes, our practice spans the areas that matter most to our clients.' ),
				'home_pa1_title'   => array( 'label' => 'Card 1 — title', 'type' => 'text', 'default' => 'Civil Litigation' ),
				'home_pa1_text'    => array( 'label' => 'Card 1 — text', 'type' => 'textarea', 'default' => 'Property disputes, contract enforcement, recovery suits and civil appeals handled with rigour and strategy.' ),
				'home_pa2_title'   => array( 'label' => 'Card 2 — title', 'type' => 'text', 'default' => 'Corporate & Commercial' ),
				'home_pa2_text'    => array( 'label' => 'Card 2 — text', 'type' => 'textarea', 'default' => 'Company formation, compliance, commercial contracts and advisory for businesses at every stage.' ),
				'home_pa3_title'   => array( 'label' => 'Card 3 — title', 'type' => 'text', 'default' => 'Family Law' ),
				'home_pa3_text'    => array( 'label' => 'Card 3 — text', 'type' => 'textarea', 'default' => 'Divorce, maintenance, custody and matrimonial matters approached with sensitivity and discretion.' ),
				'home_pa4_title'   => array( 'label' => 'Card 4 — title', 'type' => 'text', 'default' => 'Criminal Defence' ),
				'home_pa4_text'    => array( 'label' => 'Card 4 — text', 'type' => 'textarea', 'default' => 'Bail, trial representation and appeals — protecting your rights at every point in the process.' ),
				'home_pa5_title'   => array( 'label' => 'Card 5 — title', 'type' => 'text', 'default' => 'Property & Real Estate' ),
				'home_pa5_text'    => array( 'label' => 'Card 5 — text', 'type' => 'textarea', 'default' => 'Title verification, transactions, documentation and landlord–tenant matters, done right.' ),
				'home_pa6_title'   => array( 'label' => 'Card 6 — title', 'type' => 'text', 'default' => 'Legal Documentation' ),
				'home_pa6_text'    => array( 'label' => 'Card 6 — text', 'type' => 'textarea', 'default' => 'Agreements, wills, power of attorney and affidavits — precise, compliant and protective.' ),
			),
		),
		'al_home_why' => array(
			'title'  => __( 'Home · Why Choose Us', 'amar-legal' ),
			'fields' => array(
				'home_why_title'  => array( 'label' => 'Heading', 'type' => 'text', 'default' => 'Counsel You Can Rely On' ),
				'home_why1_title' => array( 'label' => 'Feature 1 — title', 'type' => 'text', 'default' => 'Proven Experience' ),
				'home_why1_text'  => array( 'label' => 'Feature 1 — text', 'type' => 'textarea', 'default' => 'Decades of combined practice across trial courts, tribunals and appellate forums.' ),
				'home_why2_title' => array( 'label' => 'Feature 2 — title', 'type' => 'text', 'default' => 'Uncompromising Integrity' ),
				'home_why2_text'  => array( 'label' => 'Feature 2 — text', 'type' => 'textarea', 'default' => 'Honest counsel and ethical conduct guide every decision we make on your behalf.' ),
				'home_why3_title' => array( 'label' => 'Feature 3 — title', 'type' => 'text', 'default' => 'Client-First Approach' ),
				'home_why3_text'  => array( 'label' => 'Feature 3 — text', 'type' => 'textarea', 'default' => 'We listen closely, explain clearly, and tailor strategy to your specific situation.' ),
				'home_why4_title' => array( 'label' => 'Feature 4 — title', 'type' => 'text', 'default' => 'Responsive Service' ),
				'home_why4_text'  => array( 'label' => 'Feature 4 — text', 'type' => 'textarea', 'default' => 'Timely updates and accessible advocates who respect your time and concerns.' ),
			),
		),
		'al_home_quote' => array(
			'title'  => __( 'Home · Quote & Call-to-Action', 'amar-legal' ),
			'fields' => array(
				'home_quote_text' => array( 'label' => 'Quote text', 'type' => 'textarea', 'default' => 'The law is not merely a profession to us — it is a commitment to fairness, to dignity, and to the people who place their trust in our hands.' ),
				'home_quote_by'   => array( 'label' => 'Quote attribution', 'type' => 'text', 'default' => '— The Amar Legal Team' ),
				'home_cta_title'  => array( 'label' => 'CTA heading', 'type' => 'text', 'default' => "Facing a Legal Challenge? Let's Talk." ),
				'home_cta_text'   => array( 'label' => 'CTA text', 'type' => 'textarea', 'default' => 'Schedule a confidential consultation with our team and take the first step toward clarity and resolution.' ),
				'home_cta_btn'    => array( 'label' => 'CTA button text', 'type' => 'text', 'default' => 'Book Your Consultation' ),
				'home_cta_image'  => array( 'label' => 'CTA background image', 'type' => 'image', 'default' => 'cta-consult.jpg' ),
			),
		),
	);
}


/**
 * ABOUT page fields.
 */
function amar_legal_fields_about() {
	return array(
		'al_about_banner' => array(
			'title'  => __( 'About · Banner & Story', 'amar-legal' ),
			'fields' => array(
				'about_banner_image' => array( 'label' => 'Banner image', 'type' => 'image', 'default' => 'banner-about.jpg' ),
				'about_story_eyebrow' => array( 'label' => 'Eyebrow', 'type' => 'text', 'default' => 'Our Story' ),
				'about_story_title'  => array( 'label' => 'Heading', 'type' => 'text', 'default' => 'Rooted in the Idea That Law Serves People' ),
				'about_story_p1'     => array( 'label' => 'Paragraph 1', 'type' => 'textarea', 'default' => 'Law has evolved with the evolution of civilization. Civil society has found it useful to give prominence to law with a view to inculcate discipline in the lives of its members — so that each member contributes to the development of a society where every individual can lead a life of dignity, in a social environment of peace and harmony, giving due honour to the rights, duties and privileges of their co-members.' ),
				'about_story_p2'     => array( 'label' => 'Paragraph 2', 'type' => 'textarea', 'default' => 'Today, law has taken an institutionalised framework and continuously thrives to achieve a society where all its members can progress without disturbing the rights and privileges of others — contributing to a community full of peace, harmony, discipline and the spirit of co-existence.' ),
				'about_story_p3'     => array( 'label' => 'Paragraph 3', 'type' => 'textarea', 'default' => 'Amar Legal was founded on this very belief: that sound legal counsel is not simply about winning arguments, but about upholding fairness and protecting the dignity of every client we serve.' ),
				'about_story_image'  => array( 'label' => 'Story image', 'type' => 'image', 'default' => 'about-firm.jpg' ),
				'about_badge_num'    => array( 'label' => 'Badge — top text', 'type' => 'text', 'default' => 'Trust' ),
				'about_badge_txt'    => array( 'label' => 'Badge — caption', 'type' => 'text', 'default' => 'Earned through every case we handle' ),
			),
		),
		'al_about_mv' => array(
			'title'  => __( 'About · Mission & Vision', 'amar-legal' ),
			'fields' => array(
				'about_mission_title' => array( 'label' => 'Mission — title', 'type' => 'text', 'default' => 'Our Mission' ),
				'about_mission_text'  => array( 'label' => 'Mission — text', 'type' => 'textarea', 'default' => "To provide exceptional legal services with integrity, professionalism and an unwavering commitment to our clients' best interests — making the law accessible, understandable and effective for everyone we represent." ),
				'about_vision_title'  => array( 'label' => 'Vision — title', 'type' => 'text', 'default' => 'Our Vision' ),
				'about_vision_text'   => array( 'label' => 'Vision — text', 'type' => 'textarea', 'default' => 'To be a trusted name in legal practice — recognised not only for results, but for the honesty, diligence and human understanding we bring to every matter, however large or small.' ),
			),
		),
		'al_about_values' => array(
			'title'  => __( 'About · Values', 'amar-legal' ),
			'fields' => array(
				'about_values_eyebrow'  => array( 'label' => 'Eyebrow', 'type' => 'text', 'default' => 'What Guides Us' ),
				'about_values_title'    => array( 'label' => 'Heading', 'type' => 'text', 'default' => 'The Values Behind Our Practice' ),
				'about_values_subtitle' => array( 'label' => 'Subtitle', 'type' => 'textarea', 'default' => 'Four principles shape how we advise, advocate and conduct ourselves — in the courtroom and beyond.' ),
				'about_val1_title' => array( 'label' => 'Value 1 — title', 'type' => 'text', 'default' => 'Integrity' ),
				'about_val1_text'  => array( 'label' => 'Value 1 — text', 'type' => 'text', 'default' => 'We hold to the highest ethical standards in every engagement.' ),
				'about_val2_title' => array( 'label' => 'Value 2 — title', 'type' => 'text', 'default' => 'Excellence' ),
				'about_val2_text'  => array( 'label' => 'Value 2 — text', 'type' => 'text', 'default' => 'We pursue the best possible outcome in every case we accept.' ),
				'about_val3_title' => array( 'label' => 'Value 3 — title', 'type' => 'text', 'default' => 'Client Focus' ),
				'about_val3_text'  => array( 'label' => 'Value 3 — text', 'type' => 'text', 'default' => 'Your concerns and priorities remain at the centre of our work.' ),
				'about_val4_title' => array( 'label' => 'Value 4 — title', 'type' => 'text', 'default' => 'Professionalism' ),
				'about_val4_text'  => array( 'label' => 'Value 4 — text', 'type' => 'text', 'default' => 'Every matter is handled with dedication, discretion and expertise.' ),
			),
		),
		'al_about_why' => array(
			'title'  => __( 'About · Why Choose Us & CTA', 'amar-legal' ),
			'fields' => array(
				'about_why_eyebrow' => array( 'label' => 'Eyebrow', 'type' => 'text', 'default' => 'Why Clients Choose Us' ),
				'about_why_title'   => array( 'label' => 'Heading', 'type' => 'text', 'default' => 'Experience Meets Genuine Care' ),
				'about_why_text'    => array( 'label' => 'Paragraph', 'type' => 'textarea', 'default' => 'With years of experience across diverse areas of law, our team brings comprehensive knowledge and practical judgement to every case. We take time to understand your unique situation and craft strategies aimed at the best achievable result.' ),
				'about_why_tick1'   => array( 'label' => 'Checklist 1', 'type' => 'text', 'default' => 'Clear, jargon-free explanations at every stage' ),
				'about_why_tick2'   => array( 'label' => 'Checklist 2', 'type' => 'text', 'default' => 'Strategies tailored to your specific circumstances' ),
				'about_why_tick3'   => array( 'label' => 'Checklist 3', 'type' => 'text', 'default' => 'Confidentiality and respect, without exception' ),
				'about_why_btn'     => array( 'label' => 'Button text', 'type' => 'text', 'default' => 'Talk to Our Team' ),
				'about_why_image'   => array( 'label' => 'Image', 'type' => 'image', 'default' => 'office.jpg' ),
				'about_cta_title'   => array( 'label' => 'CTA heading', 'type' => 'text', 'default' => 'Let Us Help You Move Forward' ),
				'about_cta_text'    => array( 'label' => 'CTA text', 'type' => 'textarea', 'default' => 'Whatever your legal concern, our advocates are ready to listen and guide you with clarity.' ),
				'about_cta_btn'     => array( 'label' => 'CTA button', 'type' => 'text', 'default' => 'Request a Consultation' ),
				'about_cta_image'   => array( 'label' => 'CTA background image', 'type' => 'image', 'default' => 'cta-consult.jpg' ),
			),
		),
	);
}

/**
 * PRACTICE AREAS page fields.
 */
function amar_legal_fields_practice() {
	return array(
		'al_practice_intro' => array(
			'title'  => __( 'Practice · Banner & Intro', 'amar-legal' ),
			'fields' => array(
				'practice_banner_image' => array( 'label' => 'Banner image', 'type' => 'image', 'default' => 'banner-practice.jpg' ),
				'practice_intro_eyebrow'  => array( 'label' => 'Eyebrow', 'type' => 'text', 'default' => 'Comprehensive Counsel' ),
				'practice_intro_title'    => array( 'label' => 'Heading', 'type' => 'text', 'default' => 'Legal Services Across the Matters That Matter Most' ),
				'practice_intro_subtitle' => array( 'label' => 'Subtitle', 'type' => 'textarea', 'default' => 'Amar Legal offers dependable representation and advice across a broad range of practice areas. Whatever your situation, our team brings focused expertise and genuine commitment to your cause.' ),
			),
		),
		'al_practice_detail' => array(
			'title'  => __( 'Practice · Detailed Sections', 'amar-legal' ),
			'fields' => array(
				'practice_d1_title' => array( 'label' => 'Section 1 — title', 'type' => 'text', 'default' => 'Civil Litigation & Disputes' ),
				'practice_d1_text'  => array( 'label' => 'Section 1 — text', 'type' => 'textarea', 'default' => 'We represent clients in a wide spectrum of civil matters — property disputes, breach of contract, recovery suits, tort claims and civil appeals. Our approach combines careful preparation with sound courtroom strategy to protect your rights and interests.' ),
				'practice_d1_image' => array( 'label' => 'Section 1 — image', 'type' => 'image', 'default' => 'practice-civil.jpg' ),
				'practice_d2_title' => array( 'label' => 'Section 2 — title', 'type' => 'text', 'default' => 'Corporate & Commercial Law' ),
				'practice_d2_text'  => array( 'label' => 'Section 2 — text', 'type' => 'textarea', 'default' => 'From company formation to ongoing compliance, we provide practical legal solutions for businesses of every size. Our services cover corporate governance, commercial contracts, regulatory matters and dispute resolution — helping you operate with confidence.' ),
				'practice_d2_image' => array( 'label' => 'Section 2 — image', 'type' => 'image', 'default' => 'practice-corporate.jpg' ),
				'practice_d3_title' => array( 'label' => 'Section 3 — title', 'type' => 'text', 'default' => 'Family & Matrimonial Law' ),
				'practice_d3_text'  => array( 'label' => 'Section 3 — text', 'type' => 'textarea', 'default' => 'Family matters demand both legal skill and human sensitivity. We handle divorce, maintenance, child custody, adoption and domestic disputes with discretion and compassion — always mindful of the emotional weight these matters carry.' ),
				'practice_d3_image' => array( 'label' => 'Section 3 — image', 'type' => 'image', 'default' => 'practice-family.jpg' ),
			),
		),
		'al_practice_more' => array(
			'title'  => __( 'Practice · More Cards & CTA', 'amar-legal' ),
			'fields' => array(
				'practice_more_title' => array( 'label' => 'Section heading', 'type' => 'text', 'default' => 'More Ways We Can Help' ),
				'practice_m1_title' => array( 'label' => 'Card 1 — title', 'type' => 'text', 'default' => 'Criminal Defence' ),
				'practice_m1_text'  => array( 'label' => 'Card 1 — text', 'type' => 'textarea', 'default' => 'Strong, principled defence in criminal matters — from bail applications and trial representation to appeals — with your rights protected throughout.' ),
				'practice_m2_title' => array( 'label' => 'Card 2 — title', 'type' => 'text', 'default' => 'Property & Real Estate' ),
				'practice_m2_text'  => array( 'label' => 'Card 2 — text', 'type' => 'textarea', 'default' => 'Title verification, sale and purchase transactions, documentation and landlord–tenant matters — ensuring your interests are legally secure.' ),
				'practice_m3_title' => array( 'label' => 'Card 3 — title', 'type' => 'text', 'default' => 'Legal Documentation' ),
				'practice_m3_text'  => array( 'label' => 'Card 3 — text', 'type' => 'textarea', 'default' => 'Professional drafting and review of contracts, agreements, wills, power of attorney and affidavits — precise, compliant and protective of your rights.' ),
				'practice_m4_title' => array( 'label' => 'Card 4 — title', 'type' => 'text', 'default' => 'Advisory & Consultation' ),
				'practice_m4_text'  => array( 'label' => 'Card 4 — text', 'type' => 'textarea', 'default' => 'Clear legal opinions and strategic guidance to help you make well-informed decisions before matters escalate.' ),
				'practice_m5_title' => array( 'label' => 'Card 5 — title', 'type' => 'text', 'default' => 'Dispute Resolution' ),
				'practice_m5_text'  => array( 'label' => 'Card 5 — text', 'type' => 'textarea', 'default' => 'Mediation and alternative dispute resolution that seek fair, efficient outcomes without unnecessary litigation.' ),
				'practice_m6_title' => array( 'label' => 'Card 6 — title', 'type' => 'text', 'default' => 'Court Representation' ),
				'practice_m6_text'  => array( 'label' => 'Card 6 — text', 'type' => 'textarea', 'default' => 'Skilled representation before various courts and tribunals, backed by thorough preparation and clear advocacy.' ),
				'practice_cta_title' => array( 'label' => 'CTA heading', 'type' => 'text', 'default' => 'Not Sure Which Area Applies to You?' ),
				'practice_cta_text'  => array( 'label' => 'CTA text', 'type' => 'textarea', 'default' => "Reach out for a confidential consultation — we'll help you understand your options and the right way forward." ),
				'practice_cta_btn'   => array( 'label' => 'CTA button', 'type' => 'text', 'default' => 'Speak With an Advocate' ),
				'practice_cta_image' => array( 'label' => 'CTA background image', 'type' => 'image', 'default' => 'cta-consult.jpg' ),
			),
		),
	);
}

/**
 * TEAM page fields.
 */
function amar_legal_fields_team() {
	return array(
		'al_team_lead' => array(
			'title'  => __( 'Team · Banner & Leadership', 'amar-legal' ),
			'fields' => array(
				'team_banner_image' => array( 'label' => 'Banner image', 'type' => 'image', 'default' => 'banner-team.jpg' ),
				'team_lead_eyebrow' => array( 'label' => 'Eyebrow', 'type' => 'text', 'default' => 'Leadership' ),
				'team_lead_title'   => array( 'label' => 'Heading', 'type' => 'text', 'default' => 'A Practice Led by Conviction' ),
				'team_lead_p1'      => array( 'label' => 'Paragraph 1', 'type' => 'textarea', 'default' => 'Amar Legal is guided by advocates who believe that the finest legal work begins with genuinely understanding the people it serves. Our leadership brings years of courtroom experience, a deep respect for the law, and a steady commitment to doing right by every client.' ),
				'team_lead_p2'      => array( 'label' => 'Paragraph 2', 'type' => 'textarea', 'default' => 'That philosophy shapes the entire firm — a team that is approachable, meticulous, and unwavering in its dedication to your interests.' ),
				'team_lead_btn'     => array( 'label' => 'Button text', 'type' => 'text', 'default' => 'Arrange a Meeting' ),
				'team_lead_image'   => array( 'label' => 'Leadership image', 'type' => 'image', 'default' => 'founder-portrait.jpg' ),
			),
		),
		'al_team_members' => array(
			'title'  => __( 'Team · Members', 'amar-legal' ),
			'fields' => array(
				'team_grid_eyebrow'  => array( 'label' => 'Eyebrow', 'type' => 'text', 'default' => 'Meet the Advocates' ),
				'team_grid_title'    => array( 'label' => 'Heading', 'type' => 'text', 'default' => 'Experienced Professionals, Genuinely Committed' ),
				'team_grid_subtitle' => array( 'label' => 'Subtitle', 'type' => 'textarea', 'default' => 'Our advocates combine specialised knowledge with a shared dedication to integrity and client care.' ),
				'team_m1_name'  => array( 'label' => 'Member 1 — name', 'type' => 'text', 'default' => 'Adv. [Name]' ),
				'team_m1_role'  => array( 'label' => 'Member 1 — role', 'type' => 'text', 'default' => 'Founder & Principal Advocate' ),
				'team_m1_bio'   => array( 'label' => 'Member 1 — bio', 'type' => 'textarea', 'default' => "Leads the firm's civil and corporate practice, with extensive experience before trial courts and appellate forums." ),
				'team_m1_photo' => array( 'label' => 'Member 1 — photo', 'type' => 'image', 'default' => 'attorney-1.jpg' ),
				'team_m2_name'  => array( 'label' => 'Member 2 — name', 'type' => 'text', 'default' => 'Adv. [Name]' ),
				'team_m2_role'  => array( 'label' => 'Member 2 — role', 'type' => 'text', 'default' => 'Senior Associate' ),
				'team_m2_bio'   => array( 'label' => 'Member 2 — bio', 'type' => 'textarea', 'default' => 'Focuses on family and matrimonial matters, known for a sensitive yet effective approach to complex disputes.' ),
				'team_m2_photo' => array( 'label' => 'Member 2 — photo', 'type' => 'image', 'default' => 'attorney-2.jpg' ),
				'team_m3_name'  => array( 'label' => 'Member 3 — name', 'type' => 'text', 'default' => 'Adv. [Name]' ),
				'team_m3_role'  => array( 'label' => 'Member 3 — role', 'type' => 'text', 'default' => 'Associate — Criminal Defence' ),
				'team_m3_bio'   => array( 'label' => 'Member 3 — bio', 'type' => 'textarea', 'default' => "Handles criminal defence and bail matters with diligence, ensuring clients' rights are safeguarded at every stage." ),
				'team_m3_photo' => array( 'label' => 'Member 3 — photo', 'type' => 'image', 'default' => 'attorney-3.jpg' ),
			),
		),
		'al_team_commit' => array(
			'title'  => __( 'Team · Commitment & CTA', 'amar-legal' ),
			'fields' => array(
				'team_commit_title' => array( 'label' => 'Heading', 'type' => 'text', 'default' => 'What Every Client Can Expect' ),
				'team_c1_title' => array( 'label' => 'Item 1 — title', 'type' => 'text', 'default' => 'Timely Attention' ),
				'team_c1_text'  => array( 'label' => 'Item 1 — text', 'type' => 'text', 'default' => "Prompt responses and regular updates, so you're never left uncertain." ),
				'team_c2_title' => array( 'label' => 'Item 2 — title', 'type' => 'text', 'default' => 'Complete Confidentiality' ),
				'team_c2_text'  => array( 'label' => 'Item 2 — text', 'type' => 'text', 'default' => 'Your matters are handled with the utmost discretion and privacy.' ),
				'team_c3_title' => array( 'label' => 'Item 3 — title', 'type' => 'text', 'default' => 'Honest Guidance' ),
				'team_c3_text'  => array( 'label' => 'Item 3 — text', 'type' => 'text', 'default' => 'Straightforward advice about your options — never false assurances.' ),
				'team_cta_title' => array( 'label' => 'CTA heading', 'type' => 'text', 'default' => 'Work With a Team That Puts You First' ),
				'team_cta_text'  => array( 'label' => 'CTA text', 'type' => 'textarea', 'default' => 'Schedule a consultation and experience the Amar Legal difference for yourself.' ),
				'team_cta_btn'   => array( 'label' => 'CTA button', 'type' => 'text', 'default' => 'Book a Consultation' ),
				'team_cta_image' => array( 'label' => 'CTA background image', 'type' => 'image', 'default' => 'cta-consult.jpg' ),
			),
		),
	);
}

/**
 * CONTACT page fields.
 */
function amar_legal_fields_contact() {
	return array(
		'al_contact_intro' => array(
			'title'  => __( 'Contact · Banner & Intro', 'amar-legal' ),
			'fields' => array(
				'contact_banner_image' => array( 'label' => 'Banner image', 'type' => 'image', 'default' => 'banner-contact.jpg' ),
				'contact_intro_eyebrow'  => array( 'label' => 'Eyebrow', 'type' => 'text', 'default' => "We're Here to Help" ),
				'contact_intro_title'    => array( 'label' => 'Heading', 'type' => 'text', 'default' => 'Schedule a Confidential Consultation' ),
				'contact_intro_subtitle' => array( 'label' => 'Subtitle', 'type' => 'textarea', 'default' => 'Tell us about your matter and our team will respond within one business day. All enquiries are treated in the strictest confidence.' ),
				'contact_map_image'      => array( 'label' => 'Map image (used if no Maps URL is set in Contact Details)', 'type' => 'image', 'default' => 'map.jpg' ),
			),
		),
	);
}
