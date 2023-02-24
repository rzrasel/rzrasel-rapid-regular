import 'package:flutter/material.dart';
import 'package:url_launcher/url_launcher.dart';
// Colors
Color kPrimaryColor = Color(0xFF1C254E);

// Social Media
const kSocialIcons = [
  "https://img.icons8.com/ios-glyphs/480/ffffff/instagram-new.png",
  "https://img.icons8.com/android/480/ffffff/twitter.png",
  "https://img.icons8.com/metro/308/ffffff/linkedin.png",
];

// URL Launcher
/*void launchURL(String _url) async =>
    await canLaunch(_url) ? await launch(_url) : throw 'Could not launch $_url';*/
Future<void> onLaunchUrl(Uri url) async {
  await canLaunchUrl(url)
      ? await launchUrl(url)
      : throw 'Could not launch $url';
}

final kTools1 = [];

// services
final kServicesIcons = [
  "assets/services/booking.png",
  "assets/services/progress.png",
  "assets/services/hand.png",
];

final kServicesTitles = [
  "প্রযুক্তিতে বিনিয়োগের সুবিধা",
  "আপনার আর্থিক সংস্থান বিকাশ করুন",
  "আপনার আর্থিক ভবিষ্যত সুরক্ষিত",
];

final kServicesDescriptions = [
  "আজ, আপনি প্রযুক্তি ব্যবহার করে স্বয়ংক্রিয় পদ্ধতিতে প্রক্রিয়াটি সম্পূর্ণ করার মাধ্যমে সবচেয়ে সহজ এবং দ্রুততম উপায়ে স্থানীয়ভাবে এবং বিশ্বব্যাপী বিনিয়োগ করতে পারেন।",
  "বিনিয়োগ মূল্যস্ফীতি থেকে আপনার অর্থের প্রকৃত মূল্য সংরক্ষণ করে এবং এর মূল্য বৃদ্ধির জন্য বছরের পর বছর এটি বিকাশ করে।",
  "দীর্ঘমেয়াদী বিনিয়োগ অবসর গ্রহণের পরে বা যখন আপনি আপনার স্বপ্ন অর্জনের জন্য কাজ করার সিদ্ধান্ত নেন তখন আপনার ভবিষ্যতের আর্থিক স্বাধীনতার নিশ্চয়তা দেয়।",
];

final List<String> sectionsMenuName = [
  "গুরুত্বপূর্ণ প্রশ্ন",
  "আমার সম্পর্কে",
  "আমরা কেন?",
  "হিসাবপত্র",
  "আমার দল",
  "রক্ষণশীল",
  "আমাদের সাথে যোগাযোগ করুন",
];