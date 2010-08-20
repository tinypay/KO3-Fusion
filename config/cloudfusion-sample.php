<?php defined('SYSPATH') or die('No direct access allowed.');

/**
 * File: Configuration
 * 	This is the Kohana config file for the original Cloudfusion 'config.inc.php'.
 *
 * Copyright:
 * 	2006-2009 Foleeo, Inc., and contributors.
 *
 * License:
 * 	Simplified BSD License - http://opensource.org/licenses/bsd-license.php
 *
 * See Also:
 * 	CloudFusion - http://getcloudfusion.com
 */

return array(
	
	
/** Constant: AWS_KEY
 *
 * Amazon Web Services Key. <http://aws-portal.amazon.com/gp/aws/developer/account/index.html?ie=UTF8&action=access-key>
 */
	'aws_key' => '',
	
/**
 * Constant: AWS_SECRET_KEY
 * 	Amazon Web Services Secret Key. <http://aws-portal.amazon.com/gp/aws/developer/account/index.html?ie=UTF8&action=access-key>
 */
	'aws_secret_key' => '',

/**
 * Constant: AWS_ACCOUNT_ID
 * 	Amazon Account ID without dashes. Used for identification with Amazon EC2. <http://aws-portal.amazon.com/gp/aws/developer/account/index.html?ie=UTF8&action=access-key>
 */
	'aws_account_id' => '',
	
/**
 * Constant: AWS_ASSOC_ID
 * 	Amazon Associates ID. Used for crediting referrals via Amazon AAWS. <http://affiliate-program.amazon.com/gp/associates/join/>
 */
	'aws_assoc_id' => '',

/**
 * Constant: AWS_DEFAULT_LOCALE
 * 	Locale that all PAS methods should default to. Can be overridden per-instance. Valid values are 'us', 'uk', 'ca', 'fr', 'de', or 'jp'.
 */
	'aws_default_locale' => '',

/**
 * Constant: AWS_CANONICAL_ID
 * 	Your CanonicalUser ID. Used for setting access control settings in AmazonS3. Must be fetched from the server. Call <?php print_r($s3->get_canonical_user_id()); ?> to view.
 */
	'aws_canonical_id' => '',
	
/**
 * Constant: AWS_CANONICAL_NAME
 * 	Your CanonicalUser DisplayName. Used for setting access control settings in AmazonS3. Must be fetched from the server. Call <?php print_r($s3->get_canonical_user_id()); ?> to view.
 */
	'aws_canonical_name' => '',
	
);
