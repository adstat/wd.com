// pages/my_page/personal_data/personal_data.js
Page({

  /**
   * 页面的初始数据
   */
  data: {

  },
  ture_name:function(){
    wx.navigateTo({
      url: '../name/name'
    })
  },
  nicname:function(){
    wx.navigateTo({
      url: '../nickname/nickname'
    })
  },

  company:function(){
    wx.navigateTo({
      url: '../company/company'
    })
  },
  mail:function(){
    wx.navigateTo({
      url: '../mailbox/mailbox'
    })
  },
  work_jl:function(){
    wx.navigateTo({
      url: '../work_list/work_list'
    })
  },
  education:function(){
    wx.navigateTo({
      url: '../education_list/education_list'
    })
  },
  //公司地址
  work_address:function(){
    wx.navigateTo({
      url: '../address/address'
    })
  },

  // 职务
  post:function(){
      wx.navigateTo({
        url: '../post/post'
      })
  },

  card:function(){
    wx.navigateTo({
      url: '../card/card'
    })
  },
  /**
   * 生命周期函数--监听页面加载
   */
  onLoad: function (options) {
    wx.setNavigationBarTitle({
      title: '个人资料'  //修改title
    })
  },

  /**
   * 生命周期函数--监听页面初次渲染完成
   */
  onReady: function () {

  },

  /**
   * 生命周期函数--监听页面显示
   */
  onShow: function () {

  },

  /**
   * 生命周期函数--监听页面隐藏
   */
  onHide: function () {

  },

  /**
   * 生命周期函数--监听页面卸载
   */
  onUnload: function () {

  },

  /**
   * 页面相关事件处理函数--监听用户下拉动作
   */
  onPullDownRefresh: function () {

  },

  /**
   * 页面上拉触底事件的处理函数
   */
  onReachBottom: function () {

  },

  /**
   * 用户点击右上角分享
   */
  onShareAppMessage: function () {

  }
})