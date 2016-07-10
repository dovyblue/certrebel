<?php
function get_receipt($info) {
	$receipt = '<!doctype html>
							<html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
								<head>
									<!-- NAME: 1 COLUMN - BANDED -->
									<!--[if gte mso 15]>
									<xml>
										<o:OfficeDocumentSettings>
										<o:AllowPNG/>
										<o:PixelsPerInch>96</o:PixelsPerInch>
										</o:OfficeDocumentSettings>
									</xml>
									<![endif]-->
									<meta charset="UTF-8">
											<meta http-equiv="X-UA-Compatible" content="IE=edge">
											<meta name="viewport" content="width=device-width, initial-scale=1">
									<title>Order Details</title>
											
									<style type="text/css">
									p{
										margin:10px 0;
										padding:0;
									}
									table{
										border-collapse:collapse;
									}
									h1,h2,h3,h4,h5,h6{
										display:block;
										margin:0;
										padding:0;
									}
									img,a img{
										border:0;
										height:auto;
										outline:none;
										text-decoration:none;
									}
									body,#bodyTable,#bodyCell{
										height:100%;
										margin:0;
										padding:0;
										width:100%;
									}
									#outlook a{
										padding:0;
									}
									img{
										-ms-interpolation-mode:bicubic;
									}
									table{
										mso-table-lspace:0pt;
										mso-table-rspace:0pt;
									}
									.ReadMsgBody{
										width:100%;
									}
									.ExternalClass{
										width:100%;
									}
									p,a,li,td,blockquote{
										mso-line-height-rule:exactly;
									}
									a[href^=tel],a[href^=sms]{
										color:inherit;
										cursor:default;
										text-decoration:none;
									}
									p,a,li,td,body,table,blockquote{
										-ms-text-size-adjust:100%;
										-webkit-text-size-adjust:100%;
									}
									.ExternalClass,.ExternalClass p,.ExternalClass td,.ExternalClass div,.ExternalClass span,.ExternalClass font{
										line-height:100%;
									}
									a[x-apple-data-detectors]{
										color:inherit !important;
										text-decoration:none !important;
										font-size:inherit !important;
										font-family:inherit !important;
										font-weight:inherit !important;
										line-height:inherit !important;
									}
									.templateContainer{
										max-width:600px !important;
									}
									a.mcnButton{
										display:block;
									}
									.mcnImage{
										vertical-align:bottom;
									}
									.mcnTextContent{
										word-break:break-word;
									}
									.mcnTextContent img{
										height:auto !important;
									}
									.mcnDividerBlock{
										table-layout:fixed !important;
									}
								/*
								@tab Page
								@section Background Style
								@tip Set the background color and top border for your email. You may want to choose colors that match your company\'s branding.
								*/
									body,#bodyTable{
										/*@editable*/background-color:#FAFAFA;
									}
								/*
								@tab Page
								@section Background Style
								@tip Set the background color and top border for your email. You may want to choose colors that match your company\'s branding.
								*/
									#bodyCell{
										/*@editable*/border-top:0;
									}
								/*
								@tab Page
								@section Heading 1
								@tip Set the styling for all first-level headings in your emails. These should be the largest of your headings.
								@style heading 1
								*/
									h1{
										/*@editable*/color:#202020;
										/*@editable*/font-family:Helvetica;
										/*@editable*/font-size:26px;
										/*@editable*/font-style:normal;
										/*@editable*/font-weight:bold;
										/*@editable*/line-height:125%;
										/*@editable*/letter-spacing:normal;
										/*@editable*/text-align:left;
									}
								/*
								@tab Page
								@section Heading 2
								@tip Set the styling for all second-level headings in your emails.
								@style heading 2
								*/
									h2{
										/*@editable*/color:#202020;
										/*@editable*/font-family:Helvetica;
										/*@editable*/font-size:22px;
										/*@editable*/font-style:normal;
										/*@editable*/font-weight:bold;
										/*@editable*/line-height:125%;
										/*@editable*/letter-spacing:normal;
										/*@editable*/text-align:left;
									}
								/*
								@tab Page
								@section Heading 3
								@tip Set the styling for all third-level headings in your emails.
								@style heading 3
								*/
									h3{
										/*@editable*/color:#202020;
										/*@editable*/font-family:Helvetica;
										/*@editable*/font-size:20px;
										/*@editable*/font-style:normal;
										/*@editable*/font-weight:bold;
										/*@editable*/line-height:125%;
										/*@editable*/letter-spacing:normal;
										/*@editable*/text-align:left;
									}
								/*
								@tab Page
								@section Heading 4
								@tip Set the styling for all fourth-level headings in your emails. These should be the smallest of your headings.
								@style heading 4
								*/
									h4{
										/*@editable*/color:#202020;
										/*@editable*/font-family:Helvetica;
										/*@editable*/font-size:18px;
										/*@editable*/font-style:normal;
										/*@editable*/font-weight:bold;
										/*@editable*/line-height:125%;
										/*@editable*/letter-spacing:normal;
										/*@editable*/text-align:left;
									}
								/*
								@tab Preheader
								@section Preheader Style
								@tip Set the background color and borders for your email\'s preheader area.
								*/
									#templatePreheader{
										/*@editable*/background-color:#FAFAFA;
										/*@editable*/border-top:0;
										/*@editable*/border-bottom:0;
										/*@editable*/padding-top:9px;
										/*@editable*/padding-bottom:9px;
									}
								/*
								@tab Preheader
								@section Preheader Text
								@tip Set the styling for your email\'s preheader text. Choose a size and color that is easy to read.
								*/
									#templatePreheader .mcnTextContent,#templatePreheader .mcnTextContent p{
										/*@editable*/color:#656565;
										/*@editable*/font-family:Helvetica;
										/*@editable*/font-size:12px;
										/*@editable*/line-height:150%;
										/*@editable*/text-align:left;
									}
								/*
								@tab Preheader
								@section Preheader Link
								@tip Set the styling for your email\'s preheader links. Choose a color that helps them stand out from your text.
								*/
									#templatePreheader .mcnTextContent a,#templatePreheader .mcnTextContent p a{
										/*@editable*/color:#656565;
										/*@editable*/font-weight:normal;
										/*@editable*/text-decoration:underline;
									}
								/*
								@tab Header
								@section Header Style
								@tip Set the background color and borders for your email\'s header area.
								*/
									#templateHeader{
										/*@editable*/background-color:#FFFFFF;
										/*@editable*/border-top:0;
										/*@editable*/border-bottom:0;
										/*@editable*/padding-top:9px;
										/*@editable*/padding-bottom:0;
									}
								/*
								@tab Header
								@section Header Text
								@tip Set the styling for your email\'s header text. Choose a size and color that is easy to read.
								*/
									#templateHeader .mcnTextContent,#templateHeader .mcnTextContent p{
										/*@editable*/color:#202020;
										/*@editable*/font-family:Helvetica;
										/*@editable*/font-size:16px;
										/*@editable*/line-height:150%;
										/*@editable*/text-align:left;
									}
								/*
								@tab Header
								@section Header Link
								@tip Set the styling for your email\'s header links. Choose a color that helps them stand out from your text.
								*/
									#templateHeader .mcnTextContent a,#templateHeader .mcnTextContent p a{
										/*@editable*/color:#2BAADF;
										/*@editable*/font-weight:normal;
										/*@editable*/text-decoration:underline;
									}
								/*
								@tab Body
								@section Body Style
								@tip Set the background color and borders for your email\'s body area.
								*/
									#templateBody{
										/*@editable*/background-color:#FFFFFF;
										/*@editable*/border-top:0;
										/*@editable*/border-bottom:0;
										/*@editable*/padding-top:9px;
										/*@editable*/padding-bottom:9px;
									}
								/*
								@tab Body
								@section Body Text
								@tip Set the styling for your email\'s body text. Choose a size and color that is easy to read.
								*/
									#templateBody .mcnTextContent,#templateBody .mcnTextContent p{
										/*@editable*/color:#202020;
										/*@editable*/font-family:Helvetica;
										/*@editable*/font-size:16px;
										/*@editable*/line-height:150%;
										/*@editable*/text-align:left;
									}
								/*
								@tab Body
								@section Body Link
								@tip Set the styling for your email\'s body links. Choose a color that helps them stand out from your text.
								*/
									#templateBody .mcnTextContent a,#templateBody .mcnTextContent p a{
										/*@editable*/color:#2BAADF;
										/*@editable*/font-weight:normal;
										/*@editable*/text-decoration:underline;
									}
								/*
								@tab Footer
								@section Footer Style
								@tip Set the background color and borders for your email\'s footer area.
								*/
									#templateFooter{
										/*@editable*/background-color:#FAFAFA;
										/*@editable*/border-top:0;
										/*@editable*/border-bottom:0;
										/*@editable*/padding-top:9px;
										/*@editable*/padding-bottom:9px;
									}
								/*
								@tab Footer
								@section Footer Text
								@tip Set the styling for your email\'s footer text. Choose a size and color that is easy to read.
								*/
									#templateFooter .mcnTextContent,#templateFooter .mcnTextContent p{
										/*@editable*/color:#656565;
										/*@editable*/font-family:Helvetica;
										/*@editable*/font-size:12px;
										/*@editable*/line-height:150%;
										/*@editable*/text-align:center;
									}
								/*
								@tab Footer
								@section Footer Link
								@tip Set the styling for your email\'s footer links. Choose a color that helps them stand out from your text.
								*/
									#templateFooter .mcnTextContent a,#templateFooter .mcnTextContent p a{
										/*@editable*/color:#656565;
										/*@editable*/font-weight:normal;
										/*@editable*/text-decoration:underline;
									}
								@media only screen and (min-width:768px){
									.templateContainer{
										width:600px !important;
									}

							}	@media only screen and (max-width: 480px){
									body,table,td,p,a,li,blockquote{
										-webkit-text-size-adjust:none !important;
									}

							}	@media only screen and (max-width: 480px){
									body{
										width:100% !important;
										min-width:100% !important;
									}

							}	@media only screen and (max-width: 480px){
									#bodyCell{
										padding-top:10px !important;
									}

							}	@media only screen and (max-width: 480px){
									.mcnImage{
										width:100% !important;
									}

							}	@media only screen and (max-width: 480px){
									.mcnCaptionTopContent,.mcnCaptionBottomContent,.mcnTextContentContainer,.mcnBoxedTextContentContainer,.mcnImageGroupContentContainer,.mcnCaptionLeftTextContentContainer,.mcnCaptionRightTextContentContainer,.mcnCaptionLeftImageContentContainer,.mcnCaptionRightImageContentContainer,.mcnImageCardLeftTextContentContainer,.mcnImageCardRightTextContentContainer{
										max-width:100% !important;
										width:100% !important;
									}

							}	@media only screen and (max-width: 480px){
									.mcnBoxedTextContentContainer{
										min-width:100% !important;
									}

							}	@media only screen and (max-width: 480px){
									.mcnImageGroupContent{
										padding:9px !important;
									}

							}	@media only screen and (max-width: 480px){
									.mcnCaptionLeftContentOuter .mcnTextContent,.mcnCaptionRightContentOuter .mcnTextContent{
										padding-top:9px !important;
									}

							}	@media only screen and (max-width: 480px){
									.mcnImageCardTopImageContent,.mcnCaptionBlockInner .mcnCaptionTopContent:last-child .mcnTextContent{
										padding-top:18px !important;
									}

							}	@media only screen and (max-width: 480px){
									.mcnImageCardBottomImageContent{
										padding-bottom:9px !important;
									}

							}	@media only screen and (max-width: 480px){
									.mcnImageGroupBlockInner{
										padding-top:0 !important;
										padding-bottom:0 !important;
									}

							}	@media only screen and (max-width: 480px){
									.mcnImageGroupBlockOuter{
										padding-top:9px !important;
										padding-bottom:9px !important;
									}

							}	@media only screen and (max-width: 480px){
									.mcnTextContent,.mcnBoxedTextContentColumn{
										padding-right:18px !important;
										padding-left:18px !important;
									}

							}	@media only screen and (max-width: 480px){
									.mcnImageCardLeftImageContent,.mcnImageCardRightImageContent{
										padding-right:18px !important;
										padding-bottom:0 !important;
										padding-left:18px !important;
									}

							}	@media only screen and (max-width: 480px){
									.mcpreview-image-uploader{
										display:none !important;
										width:100% !important;
									}

							}	@media only screen and (max-width: 480px){
								/*
								@tab Mobile Styles
								@section Heading 1
								@tip Make the first-level headings larger in size for better readability on small screens.
								*/
									h1{
										/*@editable*/font-size:22px !important;
										/*@editable*/line-height:125% !important;
									}

							}	@media only screen and (max-width: 480px){
								/*
								@tab Mobile Styles
								@section Heading 2
								@tip Make the second-level headings larger in size for better readability on small screens.
								*/
									h2{
										/*@editable*/font-size:20px !important;
										/*@editable*/line-height:125% !important;
									}

							}	@media only screen and (max-width: 480px){
								/*
								@tab Mobile Styles
								@section Heading 3
								@tip Make the third-level headings larger in size for better readability on small screens.
								*/
									h3{
										/*@editable*/font-size:18px !important;
										/*@editable*/line-height:125% !important;
									}

							}	@media only screen and (max-width: 480px){
								/*
								@tab Mobile Styles
								@section Heading 4
								@tip Make the fourth-level headings larger in size for better readability on small screens.
								*/
									h4{
										/*@editable*/font-size:16px !important;
										/*@editable*/line-height:150% !important;
									}

							}	@media only screen and (max-width: 480px){
								/*
								@tab Mobile Styles
								@section Boxed Text
								@tip Make the boxed text larger in size for better readability on small screens. We recommend a font size of at least 16px.
								*/
									.mcnBoxedTextContentContainer .mcnTextContent,.mcnBoxedTextContentContainer .mcnTextContent p{
										/*@editable*/font-size:14px !important;
										/*@editable*/line-height:150% !important;
									}

							}	@media only screen and (max-width: 480px){
								/*
								@tab Mobile Styles
								@section Preheader Visibility
								@tip Set the visibility of the email\'s preheader on small screens. You can hide it to save space.
								*/
									#templatePreheader{
										/*@editable*/display:block !important;
									}

							}	@media only screen and (max-width: 480px){
								/*
								@tab Mobile Styles
								@section Preheader Text
								@tip Make the preheader text larger in size for better readability on small screens.
								*/
									#templatePreheader .mcnTextContent,#templatePreheader .mcnTextContent p{
										/*@editable*/font-size:14px !important;
										/*@editable*/line-height:150% !important;
									}

							}	@media only screen and (max-width: 480px){
								/*
								@tab Mobile Styles
								@section Header Text
								@tip Make the header text larger in size for better readability on small screens.
								*/
									#templateHeader .mcnTextContent,#templateHeader .mcnTextContent p{
										/*@editable*/font-size:16px !important;
										/*@editable*/line-height:150% !important;
									}

							}	@media only screen and (max-width: 480px){
								/*
								@tab Mobile Styles
								@section Body Text
								@tip Make the body text larger in size for better readability on small screens. We recommend a font size of at least 16px.
								*/
									#templateBody .mcnTextContent,#templateBody .mcnTextContent p{
										/*@editable*/font-size:16px !important;
										/*@editable*/line-height:150% !important;
									}

							}	@media only screen and (max-width: 480px){
								/*
								@tab Mobile Styles
								@section Footer Text
								@tip Make the footer content text larger in size for better readability on small screens.
								*/
									#templateFooter .mcnTextContent,#templateFooter .mcnTextContent p{
										/*@editable*/font-size:14px !important;
										/*@editable*/line-height:150% !important;
									}

							}</style></head>
									<body>
											<center>
													<table align="center" border="0" cellpadding="0" cellspacing="0" height="100%" width="100%" id="bodyTable">
															<tr>
																	<td align="center" valign="top" id="bodyCell">
																			<!-- BEGIN TEMPLATE // -->
																			<table border="0" cellpadding="0" cellspacing="0" width="100%">
																					<tr>
															<td align="center" valign="top" id="templatePreheader">
																<!--[if gte mso 9]>
																<table align="center" border="0" cellspacing="0" cellpadding="0" width="600" style="width:600px;">
																<tr>
																<td align="center" valign="top" width="600" style="width:600px;">
																<![endif]-->
																<table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" class="templateContainer">
																	<tr>
																										<td valign="top" class="preheaderContainer"><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnTextBlock" style="min-width:100%;">
									<tbody class="mcnTextBlockOuter">
											<tr>
													<td valign="top" class="mcnTextBlockInner" style="padding-top:9px;">
															<!--[if mso]>
											<table align="left" border="0" cellspacing="0" cellpadding="0" width="100%" style="width:100%;">
											<tr>
											<![endif]-->
												
											<!--[if mso]>
											<td valign="top" width="390" style="width:390px;">
											<![endif]-->
															<table align="left" border="0" cellpadding="0" cellspacing="0" style="max-width:390px;" width="100%" class="mcnTextContentContainer">
																	<tbody><tr>
																			
																			<td valign="top" class="mcnTextContent" style="padding-top:0; padding-left:18px; padding-bottom:9px; padding-right:18px;">
																			
																					<p>Thank you for choosing CertRebel, LLC for your training needs! Here are your order details:</p>

																			</td>
																	</tr>
															</tbody></table>
											<!--[if mso]>
											</td>
											<![endif]-->
															
											<!--[if mso]>
											<td valign="top" width="210" style="width:210px;">
											<![endif]-->
															<table align="left" border="0" cellpadding="0" cellspacing="0" style="max-width:210px;" width="100%" class="mcnTextContentContainer">
																	<tbody><tr>
																			
																			<td valign="top" class="mcnTextContent" style="padding-top:0; padding-left:18px; padding-bottom:9px; padding-right:18px;">
																			</td>
																	</tr>
															</tbody></table>
											<!--[if mso]>
											</td>
											<![endif]-->
															
											<!--[if mso]>
											</tr>
											</table>
											<![endif]-->
													</td>
											</tr>
									</tbody>
							</table></td>
																	</tr>
																</table>
																<!--[if gte mso 9]>
																</td>
																</tr>
																</table>
																<![endif]-->
															</td>
																					</tr>
														<tr>
															<td align="center" valign="top" id="templateHeader">
																<!--[if gte mso 9]>
																<table align="center" border="0" cellspacing="0" cellpadding="0" width="600" style="width:600px;">
																<tr>
																<td align="center" valign="top" width="600" style="width:600px;">
																<![endif]-->
																<table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" class="templateContainer">
																	<tr>
																										<td valign="top" class="headerContainer"><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnImageBlock" style="min-width:100%;">
									<tbody class="mcnImageBlockOuter">
													<tr>
															<td valign="top" style="padding:9px" class="mcnImageBlockInner">
																	<table align="left" width="100%" border="0" cellpadding="0" cellspacing="0" class="mcnImageContentContainer" style="min-width:100%;">
																			<tbody><tr>
																					<td class="mcnImageContent" valign="top" style="padding-right: 9px; padding-left: 9px; padding-top: 0; padding-bottom: 0; text-align:center;">
																							
																									
																											<img align="center" alt="" src="https://gallery.mailchimp.com/46d5d92f6c0393bda964f5812/images/4cd47e3f-d342-475d-962d-bd86a904b029.png" width="300" style="max-width:300px; padding-bottom: 0; display: inline !important; vertical-align: bottom;" class="mcnImage">
																									
																							
																					</td>
																			</tr>
																	</tbody></table>
															</td>
													</tr>
									</tbody>
							</table></td>
																	</tr>
																</table>
																<!--[if gte mso 9]>
																</td>
																</tr>
																</table>
																<![endif]-->
															</td>
																					</tr>
														<tr>
															<td align="center" valign="top" id="templateBody">
																<!--[if gte mso 9]>
																<table align="center" border="0" cellspacing="0" cellpadding="0" width="600" style="width:600px;">
																<tr>
																<td align="center" valign="top" width="600" style="width:600px;">
																<![endif]-->
																<table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" class="templateContainer">
																	<tr>
																										<td valign="top" class="bodyContainer"><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnTextBlock" style="min-width:100%;">
									<tbody class="mcnTextBlockOuter">
											<tr>
													<td valign="top" class="mcnTextBlockInner" style="padding-top:9px;">
															<!--[if mso]>
											<table align="left" border="0" cellspacing="0" cellpadding="0" width="100%" style="width:100%;">
											<tr>
											<![endif]-->
												
											<!--[if mso]>
											<td valign="top" width="600" style="width:600px;">
											<![endif]-->
															<table align="left" border="0" cellpadding="0" cellspacing="0" style="max-width:100%; min-width:100%;" width="100%" class="mcnTextContentContainer">
																	<tbody><tr>
																			
																			<td valign="top" class="mcnTextContent" style="padding-top:0; padding-right:18px; padding-bottom:9px; padding-left:18px;">
																			
																					<p>&nbsp;</p>

							<h3 style="font-size: 20px; text-align: center;"><span style="font-family:courier new,courier,lucida sans typewriter,lucida typewriter,monospace"><span style="color:#A9A9A9">Order#: '.$info['order_number'].'</span></span></h3>

							<p style="text-align: left;">&nbsp;</p>

							<div style="text-align: left;"><span style="font-family:courier new,courier,lucida sans typewriter,lucida typewriter,monospace"><span style="color:#A9A9A9"><strong style="color:#808080; font-size:15px; font-weight:bold">Course Info</strong></span></span></div>

							<hr style="width:100%; margin-top:3px;">
							<table class="table">
								<tbody>
									<tr>
										<td style="color: #7A7C82;text-align: left;"><span style="color:#808080"><span style="font-family:courier new,courier,lucida sans typewriter,lucida typewriter,monospace">Course:</span></span></td>
										<td style="padding-left: 10px;color: #383C4B !important;text-align: left;"><span style="font-family:courier new,courier,lucida sans typewriter,lucida typewriter,monospace">'.$info['title'].'</span></td>
									</tr>
									<tr>
										<td style="color: #7A7C82;text-align: left;"><span style="color:#808080"><span style="font-family:courier new,courier,lucida sans typewriter,lucida typewriter,monospace">Date:</span></span></td>
										<td style="padding-left: 10px;color: #383C4B !important;text-align: left;"><span style="font-family:courier new,courier,lucida sans typewriter,lucida typewriter,monospace">'.$info['date'].'</span></td>
									</tr>
									<tr>
										<td style="color: #7A7C82;text-align: left;"><span style="color:#808080"><span style="font-family:courier new,courier,lucida sans typewriter,lucida typewriter,monospace">Time:</span></span></td>
										<td style="padding-left: 10px;color: #383C4B !important;text-align: left;"><span style="font-family:courier new,courier,lucida sans typewriter,lucida typewriter,monospace">'.$info['time'].'</span></td>
									</tr>
									<tr>
										<td style="color: #7A7C82;text-align: left;"><span style="color:#808080"><span style="font-family:courier new,courier,lucida sans typewriter,lucida typewriter,monospace">Address:</span></span></td>
										<td style="padding-left: 10px;color: #383C4B !important;text-align: left;"><span style="font-family:courier new,courier,lucida sans typewriter,lucida typewriter,monospace">'.$info['address'].'</span></td>
									</tr>
								</tbody>
							</table>

							<div style="text-align: left;"><br>
							<span style="font-family:courier new,courier,lucida sans typewriter,lucida typewriter,monospace"><span style="color:#A9A9A9"><strong style="color:#808080; font-size:15px; font-weight:bold">Buyer Info</strong></span></span></div>

							<hr style="width:100%; margin-top:3px;">
							<table class="table">
								<tbody>
									<tr>
										<td style="color: #383C4B !important;text-align: left;"><span style="font-family:courier new,courier,lucida sans typewriter,lucida typewriter,monospace">'.$info['buyer_first_name'].' '.$info['buyer_last_name'].'<br>
										  <span style="text-decoration:none">'.$info['buyer_email'].'</span><br>
										  '.$info['buyer_phone'].'<br>
										  '.$info['buyer_address1'].', ';
										  if(isset($info['buyer_address2'])&& $info['buyer_address2']!="") {
	$receipt .=					  $info['buyer_address2'].', ';
										  }
	$receipt .=				  $info['buyer_city'].', '.$info['buyer_state_name'].' '.$info['buyer_zip'].'
										  </span>
										</td>
									</tr>
								</tbody>
							</table>

							<div style="text-align: left;"><br>
							<span style="font-family:courier new,courier,lucida sans typewriter,lucida typewriter,monospace"><span style="color:#A9A9A9"><strong style="color:#808080; font-size:15px; font-weight:bold">Attendee Info</strong></span></span></div>

							<hr style="width:100%; margin-top:3px;">
							<table class="table">
								<tbody>';
								for ($i = 0; $i < $info['quantity']; ++$i) {
	$receipt .=	 '<tr>
									<td style="color: #383C4B !important;text-align: left;">
										<span style="font-family:courier new,courier,lucida sans typewriter,lucida typewriter,monospace">'.$info['attendee_info']['first_name'][$i].' '.$info['attendee_info']['last_name'][$i].'<br>
											<span style="text-decoration:none">'.$info['attendee_info']['email'][$i].'</span>';
									if (isset($info['attendee_info']['phone'][$i]) && $info['attendee_info']['phone'][$i] != "") {	
	$receipt .=  		   '<br>
										 '.$info['attendee_info']['phone'][$i].'
										</span>
									</td>';
									} else {
	$receipt .=      '</span>
									</td>';
									}
	$receipt .=  '</tr>';
									if ($i != $info['quantity'] - 1) {
  $receipt .=	 '<tr>
									<td style="text-align: left;">&nbsp;</td>
								</tr>';
								  }
								}
	$receipt .=	 '</tbody>
							</table>

							<div style="text-align: left;"><br>
							<span style="font-family:courier new,courier,lucida sans typewriter,lucida typewriter,monospace"><span style="color:#A9A9A9"><strong style="color:#808080; font-size:15px; font-weight:bold">Terms of Service</strong></span></span></div>

							<hr style="width:100%; margin-top:3px;"><span style="color: #383C4B !important;text-align: left;"><span style="font-family:courier new,courier,lucida sans typewriter,lucida typewriter,monospace"><strong>Changes and Cancellations to Your Registration for In-Person Courses:</strong><br>
							All courses are subject to a 25% administration fee if written notice is given at least 5 business days in advance to: support@certrebel.com. Refunds are not given if written notice is not received at least 5 business days in advance. Attendee substitutions are permitted and must be emailed to support@certrebel.com to be processed. In the case of an event cancellation made by CertRebel, LLC, you may choose to receive a 100% refund or you can choose to apply your registration fee to another course. By submitting payment you agree to these Terms of Service.</span><br>
							<br>
							<span style="color: #383C4B !important;text-align: left;"><span style="font-family:courier new,courier,lucida sans typewriter,lucida typewriter,monospace"><strong>Changes and Cancellations to Your Registration for Live Webinars or On-Demand Courses:</strong><br>
							All sales are final and refunds are not issued for Live Webinar and On-Demand courses.</span> </span></span><br>
							&nbsp;

							<hr style="width:100%; margin-top:3px;">
							<table class="table">
								<tbody>
									<tr>
										<td style="color: #7A7C82;text-align: justify;"><span style="font-family:courier new,courier,lucida sans typewriter,lucida typewriter,monospace"><span style="color:#A9A9A9"><strong style="color:#808080; font-size:15px; font-weight:bold">Quantity:</strong></span></span></td>
										<td style="padding-left: 10px;color: #383C4B !important;text-align: justify;"><span style="font-family:courier new,courier,lucida sans typewriter,lucida typewriter,monospace">'.$info['quantity'].'</span></td>
									</tr>
									<tr>
										<td style="color: #7A7C82;text-align: justify;"><span style="font-family:courier new,courier,lucida sans typewriter,lucida typewriter,monospace"><span style="color:#A9A9A9"><strong style="color:#808080; font-size:15px; font-weight:bold">Unit Price:</strong></span></span></td>
										<td style="padding-left: 10px;color: #383C4B !important;text-align: justify;"><span style="font-family:courier new,courier,lucida sans typewriter,lucida typewriter,monospace">$'.$info['unit_cost'].'</span></td>
									</tr>
									<tr>
										<td style="color: #7A7C82;text-align: justify;"><span style="font-family:courier new,courier,lucida sans typewriter,lucida typewriter,monospace"><span style="color:#A9A9A9"><strong style="color:#808080; font-size:15px; font-weight:bold">Subtotal:</strong></span></span></td>
										<td style="padding-left: 10px;color: #383C4B !important;text-align: justify;"><span style="font-family:courier new,courier,lucida sans typewriter,lucida typewriter,monospace">$'.$info['subtotal'].'</span></td>
									</tr>
									<tr>
										<td style="color: #7A7C82;text-align: justify;"><span style="font-family:courier new,courier,lucida sans typewriter,lucida typewriter,monospace"><span style="color:#A9A9A9"><strong style="color:#808080; font-size:15px; font-weight:bold">2% Processing Fee:</strong></span></span></td>
										<td style="padding-left: 10px;color: #383C4B !important;text-align: justify;"><span style="font-family:courier new,courier,lucida sans typewriter,lucida typewriter,monospace">$'.$info['fee'].'</span></td>
									</tr>
									<tr>
										<td style="text-align: justify;"><span style="font-family:courier new,courier,lucida sans typewriter,lucida typewriter,monospace"><strong>Total:</strong></span></td>
										<td style="padding-left: 10px;color: #383C4B !important;text-align: justify;"><span style="font-family:courier new,courier,lucida sans typewriter,lucida typewriter,monospace"><strong>$'.$info['total'].'</strong></span></td>
									</tr>
								</tbody>
							</table>

							<div style="text-align: left;">&nbsp;</div>

							<div style="text-align: left;">&nbsp;</div>

																			</td>
																	</tr>
															</tbody></table>
											<!--[if mso]>
											</td>
											<![endif]-->
															
											<!--[if mso]>
											</tr>
											</table>
											<![endif]-->
													</td>
											</tr>
									</tbody>
							</table></td>
																	</tr>
																</table>
																<!--[if gte mso 9]>
																</td>
																</tr>
																</table>
																<![endif]-->
															</td>
																					</tr>
																					<tr>
															<td align="center" valign="top" id="templateFooter">
																<!--[if gte mso 9]>
																<table align="center" border="0" cellspacing="0" cellpadding="0" width="600" style="width:600px;">
																<tr>
																<td align="center" valign="top" width="600" style="width:600px;">
																<![endif]-->
																<table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" class="templateContainer">
																	<tr>
																										<td valign="top" class="footerContainer"><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnFollowBlock" style="min-width:100%;">
									<tbody class="mcnFollowBlockOuter">
											<tr>
													<td align="center" valign="top" style="padding:9px" class="mcnFollowBlockInner">
															<table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnFollowContentContainer" style="min-width:100%;">
									<tbody><tr>
											<td align="center" style="padding-left:9px;padding-right:9px;">
													<table border="0" cellpadding="0" cellspacing="0" width="100%" style="min-width:100%;" class="mcnFollowContent">
															<tbody><tr>
																	<td align="center" valign="top" style="padding-top:9px; padding-right:9px; padding-left:9px;">
																			<table align="center" border="0" cellpadding="0" cellspacing="0">
																					<tbody><tr>
																							<td align="center" valign="top">
																									<!--[if mso]>
																									<table align="center" border="0" cellspacing="0" cellpadding="0">
																									<tr>
																									<![endif]-->
																									
																											<!--[if mso]>
																											<td align="center" valign="top">
																											<![endif]-->
																											
																											
																													<table align="left" border="0" cellpadding="0" cellspacing="0" style="display:inline;">
																															<tbody><tr>
																																	<td valign="top" style="padding-right:10px; padding-bottom:9px;" class="mcnFollowContentItemContainer">
																																			<table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnFollowContentItem">
																																					<tbody><tr>
																																							<td align="left" valign="middle" style="padding-top:5px; padding-right:10px; padding-bottom:5px; padding-left:9px;">
																																									<table align="left" border="0" cellpadding="0" cellspacing="0" width="">
																																											<tbody><tr>
																																													
																																															<td align="center" valign="middle" width="24" class="mcnFollowIconContent">
																																																	<a href="https://twitter.com/certrebel" target="_blank"><img src="https://cdn-images.mailchimp.com/icons/social-block-v2/color-twitter-48.png" style="display:block;" height="24" width="24" class=""></a>
																																															</td>
																																													
																																													
																																											</tr>
																																									</tbody></table>
																																							</td>
																																					</tr>
																																			</tbody></table>
																																	</td>
																															</tr>
																													</tbody></table>
																											
																											<!--[if mso]>
																											</td>
																											<![endif]-->
																									
																											<!--[if mso]>
																											<td align="center" valign="top">
																											<![endif]-->
																											
																											
																													<table align="left" border="0" cellpadding="0" cellspacing="0" style="display:inline;">
																															<tbody><tr>
																																	<td valign="top" style="padding-right:10px; padding-bottom:9px;" class="mcnFollowContentItemContainer">
																																			<table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnFollowContentItem">
																																					<tbody><tr>
																																							<td align="left" valign="middle" style="padding-top:5px; padding-right:10px; padding-bottom:5px; padding-left:9px;">
																																									<table align="left" border="0" cellpadding="0" cellspacing="0" width="">
																																											<tbody><tr>
																																													
																																															<td align="center" valign="middle" width="24" class="mcnFollowIconContent">
																																																	<a href="https://www.facebook.com/CertRebel/" target="_blank"><img src="https://cdn-images.mailchimp.com/icons/social-block-v2/color-facebook-48.png" style="display:block;" height="24" width="24" class=""></a>
																																															</td>
																																													
																																													
																																											</tr>
																																									</tbody></table>
																																							</td>
																																					</tr>
																																			</tbody></table>
																																	</td>
																															</tr>
																													</tbody></table>
																											
																											<!--[if mso]>
																											</td>
																											<![endif]-->
																									
																											<!--[if mso]>
																											<td align="center" valign="top">
																											<![endif]-->
																											
																											
																													<table align="left" border="0" cellpadding="0" cellspacing="0" style="display:inline;">
																															<tbody><tr>
																																	<td valign="top" style="padding-right:0; padding-bottom:9px;" class="mcnFollowContentItemContainer">
																																			<table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnFollowContentItem">
																																					<tbody><tr>
																																							<td align="left" valign="middle" style="padding-top:5px; padding-right:10px; padding-bottom:5px; padding-left:9px;">
																																									<table align="left" border="0" cellpadding="0" cellspacing="0" width="">
																																											<tbody><tr>
																																													
																																															<td align="center" valign="middle" width="24" class="mcnFollowIconContent">
																																																	<a href="http://certrebel.com" target="_blank"><img src="https://cdn-images.mailchimp.com/icons/social-block-v2/color-link-48.png" style="display:block;" height="24" width="24" class=""></a>
																																															</td>
																																													
																																													
																																											</tr>
																																									</tbody></table>
																																							</td>
																																					</tr>
																																			</tbody></table>
																																	</td>
																															</tr>
																													</tbody></table>
																											
																											<!--[if mso]>
																											</td>
																											<![endif]-->
																									
																									<!--[if mso]>
																									</tr>
																									</table>
																									<![endif]-->
																							</td>
																					</tr>
																			</tbody></table>
																	</td>
															</tr>
													</tbody></table>
											</td>
									</tr>
							</tbody></table>

													</td>
											</tr>
									</tbody>
							</table><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnDividerBlock" style="min-width:100%;">
									<tbody class="mcnDividerBlockOuter">
											<tr>
													<td class="mcnDividerBlockInner" style="min-width: 100%; padding: 10px 18px 25px;">
															<table class="mcnDividerContent" border="0" cellpadding="0" cellspacing="0" width="100%" style="min-width: 100%;border-top-width: 2px;border-top-style: solid;border-top-color: #EEEEEE;">
																	<tbody><tr>
																			<td>
																					<span></span>
																			</td>
																	</tr>
															</tbody></table>
							<!--            
															<td class="mcnDividerBlockInner" style="padding: 18px;">
															<hr class="mcnDividerContent" style="border-bottom-color:none; border-left-color:none; border-right-color:none; border-bottom-width:0; border-left-width:0; border-right-width:0; margin-top:0; margin-right:0; margin-bottom:0; margin-left:0;" />
							-->
													</td>
											</tr>
									</tbody>
							</table><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnTextBlock" style="min-width:100%;">
									<tbody class="mcnTextBlockOuter">
											<tr>
													<td valign="top" class="mcnTextBlockInner" style="padding-top:9px;">
															<!--[if mso]>
											<table align="left" border="0" cellspacing="0" cellpadding="0" width="100%" style="width:100%;">
											<tr>
											<![endif]-->
												
											<!--[if mso]>
											<td valign="top" width="600" style="width:600px;">
											<![endif]-->
															<table align="left" border="0" cellpadding="0" cellspacing="0" style="max-width:100%; min-width:100%;" width="100%" class="mcnTextContentContainer">
																	<tbody><tr>
																			
																			<td valign="top" class="mcnTextContent" style="padding-top:0; padding-right:18px; padding-bottom:9px; padding-left:18px;">
																			
																					<span style="font-family:arial,helvetica neue,helvetica,sans-serif"><em>Copyright © 2016, CertRebel, All rights reserved.</em><br>
							175 Varick Street, New York, NY 10014<br>
							<br>
							<strong>Our mailing address is:</strong><br>
							<a href="mailto:info@certrebel.com" target="_blank">info@certrebel.com</a><br>
							<br>
							Visit our <a href="http://certrebel.com/terms" target="_blank">Privacy Policy</a> if you have any questions.</span><br>
							&nbsp;
																			</td>
																	</tr>
															</tbody></table>
											<!--[if mso]>
											</td>
											<![endif]-->
															
											<!--[if mso]>
											</tr>
											</table>
											<![endif]-->
													</td>
											</tr>
									</tbody>
							</table></td>
																	</tr>
																</table>
																<!--[if gte mso 9]>
																</td>
																</tr>
																</table>
																<![endif]-->
															</td>
																					</tr>
																			</table>
																			<!-- // END TEMPLATE -->
																	</td>
															</tr>
													</table>
											</center>
									</body>
							</html>';
  return $receipt;
}
