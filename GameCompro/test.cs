using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.UI;
using UnityEngine.Networking;
using UnityEngine.SceneManagement;

public class UnityLoginLogoutRegister : MonoBehaviour
{
	
	public string baseUrl = "http://localhost/ThirteeNov/UnityLoginLogoutRegister/";
	
	
	public InputField UserName;
	public InputField Password;
    public InputField C_Password;
    public InputField FirstName;
    public InputField LastName;
	public InputField Section;
	public Text info;
    public String[] Data;
	public String A_User;
    public String A_Password;
    // Start is called before the first frame update
    void Start()
    {
     
    }

    // Update is called once per frame
    void Update()
    {
        
    }
	
	public void AccountLogout(){
		SceneManager.LoadSceneAsync("Login");
	}
	
	public void AccountRegister()
    {
        string uName = UserName.text;
        string pWord = Password.text;
        string cpWord = C_Password.text;
        string fName = FirstName.text;
        string lName = LastName.text;
        string pSec = Section.text;
        StartCoroutine(RegisterNewAccount(uName, pWord, cpWord, fName, lName, pSec));
    }
	
	public void AccountLogin()
    {
        string uName = UserName.text;
        string pWord = Password.text;
        StartCoroutine(LogInAccount(uName, pWord));
    }
	
	IEnumerator RegisterNewAccount(string uName, string pWord, string cpWord, string fName, string lName, string pSec)
    {
        WWWForm form = new WWWForm();
        form.AddField("A_register_User"      , uName);
        form.AddField("A_Password"  , pWord);
        form.AddField("C_Password"  , cpWord);
        form.AddField("A_Name"      , fName);
        form.AddField("A_Lastname"  , lName);
        form.AddField("A_Section"   , pSec);
        using (UnityWebRequest www = UnityWebRequest.Post(baseUrl, form))
        {
            www.downloadHandler = new DownloadHandlerBuffer();
            yield return www.SendWebRequest();
 
            if (www.isNetworkError)
            {
                Debug.Log(www.error);
            }
            else
            {
                string responseText = www.downloadHandler.text;
                Debug.Log("Response = " + responseText);
            }
        }
    }
	
	IEnumerator LogInAccount(string uName, string pWord)
    {
        WWWForm form = new WWWForm();
        form.AddField("A_login_User", uName);
        form.AddField("A_Password"  , pWord);
        using (UnityWebRequest www = UnityWebRequest.Post(baseUrl, form))
        {
            www.downloadHandler = new DownloadHandlerBuffer();
            yield return www.SendWebRequest();
 
            if (www.isNetworkError)
            {
                Debug.Log(www.error);
            }
            else
            {
                string responseText = www.downloadHandler.text;
                Data = responseText.Split('*');
                A_User = GetValueDat(options[0],"A_User:");
                A_Password = GetValueDat(options[0],"A_Password:");
                Debug.Log(A_User);
                Debug.Log(A_Password);
            }
        }
    }
    string GetValueDat(string data, string index){
        string value = data.Substring (data.IndexOf(index)+index.Length);
        if(value.Contains("|")){
            value = value.Remove (value.IndexOf("|"));
        }
        return value;
    }
}