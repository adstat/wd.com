// pages/my_page/my/my.js
Page({

  /**
   * 页面的初始数据
   */
  data: {

  },
  p_i_editor:function(){
    wx.navigateTo({
      url: '../personal_data/personal_data'
    })
  },
  //我的钱包
  my_bag:function(){
      wx.navigateTo({
        url: '../money/money'
      })
  },
  //我的圈子
  my_quan:function(){
    wx.navigateTo({
      url: '../circle/circle'
    })
  }, 
  //我的收藏
  my_collect:function() {
    wx.navigateTo({
      url: '../collection/collection'
    })
  },

  //关注
  guanzhu:function() {
    wx.navigateTo({
      url: '../follow/follow'
    })
  },

  //粉丝
  fans:function(){
    wx.navigateTo({
      url: '../fans/fans'
    })
  },

  //联系客服
  link_kehu:function(){
    wx.navigateTo({
      url: '../customer_service/customer_service'
    })
  },

  //个人主页
  geren_index:function(){
    wx.navigateTo({
      url: '../business_card/business_card'
    })
  },
  /**
   * 生命周期函数--监听页面加载
   */
  onLoad: function (options) {
    wx.setNavigationBarTitle({
      title: '我的'  //修改title
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