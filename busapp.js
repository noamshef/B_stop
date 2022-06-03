import React, { useState,useEffect } from 'react';
import { Button, Platform, SafeAreaView, StatusBar, StyleSheet, Text, View, util  } from 'react-native';

const Separator = () => (
  <View style={styles.separator} />
);


export default function App() {
  
 useEffect(() => {
    setInterval(() => {
      getState()
    }, 10000)
  },[])

  const [StopGo,setStopGo]=useState('תעצור בתחנה');
  const [TheNum,setNum]=useState('1');
  const [BusList,setBusList]=useState("גולדה מאיר/ישראל גלילי")
  const [Bcolor,setBcolor]=useState("grey")
  const [Btest,setBtext]=useState("אוטובוס פנוי")
/*
  const getState = async () => {
  try {
    const response = await fetch(
      'https://php-b-stop-elaifurman185577.codeanyapp.com/bus.php?line=1754&station=40'
    );
    alert("aaa")
    const num = await response.Text();
    
    SetBusSituation(num);
  } catch (error) {
    console.error(error);
  }
};
*/



 const getState = async () => {
  try {
    const response = await fetch(
      'https://php-b-stop-elaifurman185577.codeanyapp.com/bus.php?line=42&station=5'
    );
    
    const num = await response.text();
    const onlyNum = num.split('\n')[1]
    SetBusSituation(onlyNum);
  } catch (error) {
    console.error(error);
  }
};

const ButtonPressed = () => {
    if(Bcolor=='red'){
      setBcolor('grey')
      setBtext('האוטובוס פנוי')
    }
  else
  {
    setBcolor('red')
      setBtext('האוטובוס מלא')
      fetch('https://php-b-stop-elaifurman185577.codeanyapp.com/full.php?line=42',{method: 'GET',})
  }
    
      
}

const SetBusSituation = (number) => {
if(number=='0'){
      setStopGo('תמשיך הלאה')
    }
    else {
      setStopGo('תעצור בתחנה')
    }
}


   return (
    
    <SafeAreaView style={[styles.container,{top: 50},{bottom:50}]}>
    <View>
      
      <Text style={styles.title}>
        התחנה הבאה היא:
      </Text>
      <Text style={{fontSize: 30,alignSelf:'center'}}>{BusList}</Text>
      

    </View>
    <Separator />
    <View>
      <Text style={{fontSize: 50,alignSelf:'center'}}>
        {StopGo}
      </Text>
    </View>
    <Separator />
    <View>
      <Button
        title={Btest}
        color={Bcolor}
        onPress={() => ButtonPressed() }
      />
 
    </View>
    <Separator />
  </SafeAreaView>
    /*

      <Text style={{fontSize: 10,alignSelf:'center'}}>התחנה הבאה היא: </Text>
      <StatusBar style="auto" />
      <Text style={{fontSize: 30,fontWeight:'bold',color:'red'}}>תעצור בתחנה הבאה</Text>
      <Text style={{fontSize: 30,fontWeight:'bold',color:'green'}}>יכול להמשיך</Text>
             
    https://php-b-stop-elaifurman185577.codeanyapp.com/bus.php?line=1754&station=40

    */

   
  );
}


const styles = StyleSheet.create({
  container: {
    flex: 1,
    justifyContent: 'space-evenly',
    marginHorizontal: 16,
  },
  title: {
    textAlign: 'center',
    marginVertical: 8,
  },
  fixToText: {
    flexDirection: 'row',
    justifyContent: 'space-between',
  },
  separator: {
    marginVertical: 8,
    borderBottomColor: '#737373',
    borderBottomWidth: StyleSheet.hairlineWidth,
  },

});