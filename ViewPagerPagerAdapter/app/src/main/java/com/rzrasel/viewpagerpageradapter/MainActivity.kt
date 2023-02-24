package com.rzrasel.viewpagerpageradapter

import android.os.Bundle
import android.view.View
import androidx.appcompat.app.AppCompatActivity
import androidx.viewpager.widget.ViewPager


class MainActivity : AppCompatActivity() {
    private lateinit var sysViewPager: ViewPager
    var dataModelList = ArrayList<ModelObject>()
    //
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_main)
        //
        sysViewPager = findViewById<View>(R.id.sysViewPager) as ViewPager
        //
        dataModelList.add(ModelObject("Text 01", 1))
        dataModelList.add(ModelObject("Text 02", 2))
        dataModelList.add(ModelObject("Text 03", 3))
        dataModelList.add(ModelObject("Text 04", 4))
        dataModelList.add(ModelObject("Text 05", 5))
        sysViewPager.adapter = CustomPagerAdapter(this, dataModelList)
    }
}

//https://www.digitalocean.com/community/tutorials/android-viewpager-example-tutorial