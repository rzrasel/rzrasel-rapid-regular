package com.rzrasel.viewpagerfragmentpageradapter

import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import android.view.View
import androidx.viewpager2.widget.ViewPager2

class MainActivity : AppCompatActivity() {
    private lateinit var sysViewPager: ViewPager2
    //
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_main)
        //
        //sysViewPager = findViewById<View>(R.id.sysViewPager) as ViewPager2
        sysViewPager = findViewById<View>(R.id.sysViewPager) as ViewPager2
        //
        val adapter = RzViewPagerAdapter(this)
        /*adapter.addFragment(FirstFragment(), "Category")
        adapter.addFragment(FirstFragment(), "Brand")*/
        adapter.addFragment(FragmentIdea.getInstance(1, "First Fragment"), "First")
        adapter.addFragment(FragmentAnnounce.getInstance(2, "Second Fragment"), "Second")
        adapter.addFragment(FragmentConnection.getInstance(3, "Third Fragment"), "Third")
        //
        sysViewPager.adapter = adapter
        sysViewPager.currentItem = 0
    }
}

//https://guides.codepath.com/android/viewpager-with-fragmentpageradapter